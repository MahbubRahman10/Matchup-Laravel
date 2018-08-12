<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Validator;


class SubscribeController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Show all Subscriber
    public function index()
    {
    	$subscribers  = Subscriber::Orderby('created_at','=','desc')->get();
      return view('admin.subscriber.index',compact('subscribers'));
    }

    // Delete Subscriber
    public function destroy(Request $request)
    {
      $subscribers = Subscriber::find($request->id);
      $subscribers->delete();

      return Response()->json(200);
    }

    // Search Subscriber
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('subscribers')
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('subscribers')
          ->where('email','LIKE',"%{$search}%")
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }

}
