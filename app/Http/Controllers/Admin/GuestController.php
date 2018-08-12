<?php

namespace App\Http\Controllers\Admin;

use App\Guestmessage;
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


class GuestController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Show all Guest Messages
    public function index()
    {
    	$guestmessages  = Guestmessage::Orderby('created_at','=','desc')->get();
      return view('admin.custom.guestmessage.guestmessage',compact('guestmessages'));
    }

    // Show Guest Messages
    public function show($id)
    {
      $guestmessage  = Guestmessage::find($id);
      return view('admin.custom.guestmessage.viewguestmessage',compact(['guestmessage','id']));
    }

    // Show Add Guest Message page
    public function add()
    {
      return view('admin.custom.guestmessage.addguestmessage');
    }

    // Add Guest Message
    public function create(Request $request)
    {
      // Validation
      $data = Input::all();                 
      $rules=array(
        'title' => 'required',
        'relation' => 'required', 
        'message' => 'required'
      );
      $valid=Validator::make($data,$rules);
      if($valid->fails()){
        return Redirect()->back()->withErrors($valid)->withInput($request->all);
      }

      $guestmessage = new Guestmessage();
      $guestmessage->title = $request->title;
      $guestmessage->relation = $request->relation;
      $guestmessage->facebook = $request->facebook;
      $guestmessage->twitter = $request->twitter;
      $guestmessage->googleplus = $request->googleplus;
      $guestmessage->message = $request->message;
      $guestmessage->save();

      return redirect('/matchup/guestmessage');

    }


    // Show Edit Guest Message page
    public function edit($id)
    {
      $guestmessage = Guestmessage::find($id);
      return view('admin.custom.guestmessage.editguestmessage',compact(['guestmessage','id']));
    }


    // Update Guest Message
    public function update(Request $request,$id)
    {
      // Validation
      $data = Input::all();                 
      $rules=array(
        'title' => 'required',
        'relation' => 'required', 
        'message' => 'required'
      );
      $valid=Validator::make($data,$rules);
      if($valid->fails()){
        return Redirect()->back()->withErrors($valid)->withInput($request->all);
      }

      $guestmessage = Guestmessage::find($id);
      $guestmessage->title = $request->title;
      $guestmessage->relation = $request->relation;
      $guestmessage->facebook = $request->facebook;
      $guestmessage->twitter = $request->twitter;
      $guestmessage->googleplus = $request->googleplus;
      $guestmessage->message = $request->message;
      $guestmessage->save();

      return redirect('/matchup/guestmessage');

    }

    // Delete Guest Message page
    public function destroy(Request $request)
    {
      $guestmessage = Guestmessage::find($request->id);
      $guestmessage->delete();

      return Response()->json(200);
    }

    // Search Guest Message
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('guestmessages')
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('guestmessages')
          ->where('title','LIKE',"%{$search}%")
          ->Orwhere('relation','LIKE',"%{$search}%")
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }

}
