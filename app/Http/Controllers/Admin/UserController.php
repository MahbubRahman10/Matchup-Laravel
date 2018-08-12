<?php

namespace App\Http\Controllers\Admin;

use App\Charts\VisitorChart;
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


class UserController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
    	$users  = User::Orderby('created_at','=','desc')->get();
        return view('admin.user.index',compact('users'));
    }

    // View User
    public function view($id)
    {
    	$user  = User::find($id);
      $user->seen = '1';
      $user->save();
      
    	return view('admin.user.view',compact('user'));
    }

    // Ban User
    public function banuser(Request $request)
    {
    	$user = User::find($request->id);
    	$user->status = '0';
    	$user->save();
    	return Response()->json(200);
    }

    // Unban User
    public function unbanuser(Request $request)
    {
    	$user = User::find($request->id);
    	$user->status = '1';
    	$user->save();
    	return Response()->json(200);
    }

    // Search User
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('users')
          ->join('userinfos','userinfos.user_id','=','users.id')
          ->orderBy('users.created_at', 'desc')
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('users')
          ->join('userinfos','userinfos.user_id','=','users.id')
          ->where('users.name','LIKE',"%{$search}%")
          ->Orwhere('users.email','LIKE',"%{$search}%")
          ->Orwhere('users.phone','LIKE',"%{$search}%")
          ->Orwhere('userinfos.user_level','LIKE',"%{$search}%")
          ->orderBy('users.created_at', 'desc')
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }
}
