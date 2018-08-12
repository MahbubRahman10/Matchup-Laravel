<?php

namespace App\Http\Controllers\Admin;

use App\Guestmessage;
use App\Membership;
use App\Membershiplevel;
use App\User;
use App\Userinfo;
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


class MembershipController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Show all Membership
    public function index()
    {
    	$memberships  = Membership::where('status','=','Pending')->Orderby('created_at','=','desc')->get();
      return view('admin.member.member',compact('memberships'));
    }

    // Download Bank Slip
    public function download($id)
    {
      $membership  = Membership::find($id);

      return response()->download($membership->bank_slip);

    }

    // Approved Membership
    public function approved(Request $request)
    {
      $membership = Membership::find($request->id);
      $membership->status = "Approved";
      $membership->save();

      $membershiplevel = Membershiplevel::where('id','=',$membership->membershiplevel_id)->first();

      $userinfo = Userinfo::where('user_id','=',$membership->user_id)->first();
      $userinfo->user_level = $membershiplevel->level;
      $userinfo->save();

      return redirect('/matchup/membership');
    }

    // Reject Membership
    public function reject(Request $request)
    {
      $membership = Membership::find($request->id);
      $membership->status = "Canceled";
      $membership->save();

      return redirect('/matchup/membership');
    }

    // Search Membership Message
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('users')
          ->join('userinfos','userinfos.user_id','=','users.id')
          ->join('memberships','memberships.user_id','=','users.id')
          ->join('membershiplevels','membershiplevels.id','=','memberships.membershiplevel_id')
          ->orderBy('memberships.created_at', 'desc')
          ->select('*','memberships.id as mem_id',DB::raw('DATE_FORMAT(memberships.created_at, "%d %b %Y") as created_at'))
          ->where('memberships.status','=','Pending')
          ->get(); 
          
          $data = $data->unique('mem_id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('users')
          ->join('userinfos','userinfos.user_id','=','users.id')
          ->join('memberships','memberships.user_id','=','users.id')
          ->join('membershiplevels','membershiplevels.id','=','memberships.membershiplevel_id')
          ->orderBy('memberships.created_at', 'desc')
          ->select('*','memberships.id as mem_id',DB::raw('DATE_FORMAT(memberships.created_at, "%d %b %Y") as created_at'))
          ->where([['users.profile_id','LIKE',"%{$search}%"],['memberships.status','=','Pending']])
          ->Orwhere([['membershiplevels.level','LIKE',"%{$search}%"],['memberships.status','=','Pending']])
          ->Orwhere([['membershiplevels.level','LIKE',"%{$search}%"],['memberships.status','=','Pending']])
          ->Orwhere([['memberships.payment_option','LIKE',"%{$search}%"],['memberships.status','=','Pending']])
          ->Orwhere([['memberships.transaction_id','LIKE',"%{$search}%"],['memberships.status','=','Pending']])
          ->get();

          $data = $data->unique('mem_id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }


    // View Membership Level
    public function membershipsetting()
    {
      $membershiplevels = Membershiplevel::Orderby('created_at','=','desc')->get();
      return view('admin.member.membershiplevel',compact('membershiplevels'));
    }

    // Add Membership Level
    public function addmembershiplevel(Request $request)
    {
      // Validation
      $validator = Validator::make($request->all(), [
        'level' => 'required|unique:membershiplevels',
        'price' => 'required',
        'expiration' => 'required'
      ]);
      if ($validator->fails()) {
        return back()
        ->withErrors($validator)
        ->withInput();
      }

      $membershiplevel = new Membershiplevel();
      $membershiplevel->level = ucfirst($request->level);
      $membershiplevel->price = $request->price;
      $membershiplevel->time = $request->expiration;
      $membershiplevel->save();

      return back()->with('success', 'Successfully Added!');
    }


    // Update Membership Level
    public function editmembershiplevel(Request $request)
    {
      // Validation
      $validator = Validator::make($request->all(), [
        'level' => 'required|unique:membershiplevels',
        'price' => 'required',
        'expiration' => 'required'
      ]);
      if ($validator->fails()) {
        return back()
        ->withErrors($validator)
        ->withInput();
      }

      $membershiplevel = Membershiplevel::find($request->id);
      $membershiplevel->level = $request->level;
      $membershiplevel->price = $request->price;
      $membershiplevel->time = $request->expiration;
      $membershiplevel->save();

      return back()->with('success', 'Successfully Update!');
    }


      // Delete Membership Level
    public function deletemembershiplevel(Request $request)
    {
      $membershiplevel = Membershiplevel::find($request->id);
      $membershiplevel->delete();
      return Response()->json(200);
    }

    // Search Membership Level
    public function membershiplevelsearch(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('membershiplevels')
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('membershiplevels')
          ->where('level','LIKE',"%{$search}%")
          ->Orwhere('price','LIKE',"%{$search}%")
          ->Orwhere('time','LIKE',"%{$search}%")
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }


}
