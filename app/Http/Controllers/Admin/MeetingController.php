<?php

namespace App\Http\Controllers\Admin;

use App\Meeting;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use Charts;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Validator;


class MeetingController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Show all Meeting
    public function index()
    {
    	$meetings  = Meeting::Orderby('created_at','=','desc')->get();
      return view('admin.meeting.index',compact('meetings'));
    }

    // View Meeting Details
    public function view($id)
    {
      
      $meeting = Meeting::find($id);
      $meeting->status = '1';
      $meeting->save();
      $user = User::find($meeting->user_id);
      $profile = User::where('profile_id','=',$meeting->profile_id)->first();

      return view('admin.meeting.view',compact(['profile','user','meeting']));
    }

   
    // Delete Meeting
    public function destroy(Request $request)
    {
      $meeting = Meeting::find($request->id);
      $meeting->delete();

      return Response()->json(200);
    }

    // Search Guest Message
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('meetings')
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(date, "%d %b %Y") as created_at'))
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('meetings')
          ->where('profile_id','LIKE',"%{$search}%")
          ->Orwhere('name','LIKE',"%{$search}%")
          ->Orwhere('phone','LIKE',"%{$search}%")
          ->Orwhere('date','LIKE',"%{$search}%")
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(date, "%d %b %Y") as created_at'))
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }

}
