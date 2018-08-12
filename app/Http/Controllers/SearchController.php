<?php

namespace App\Http\Controllers;

use App\Blocklist;
use App\Gallery;
use App\Profilevisitor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // $users = DB::table('users')
    //             ->join('userinfos','userinfos.user_id','users.id')
    //             ->leftjoin('blocklists','blocklists.user_id','users.id')
    //             ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus]])
    //             ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
    //             ->get();

    // Search
    public function index(Request $request)
    {

        if (Auth::user() ==  true) {

            if ($request->city == 'All' && $request->community == null && $request->maritalstatus == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city != 'All' && $request->community == null && $request->maritalstatus == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All' && $request->community == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.merital_status','=',$request->maritalstatus]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All' && $request->maritalstatus == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.religion','=',$request->community]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All') {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->community == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.merital_status','=',$request->maritalstatus]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->maritalstatus == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            else{
                $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }


        }
        // Guest Search
        else{

          if ($request->city == 'All' && $request->community == null && $request->maritalstatus == null) {
            $users = DB::table('users')
            ->join('userinfos','userinfos.user_id','users.id')
            ->select('*','users.id as user_id')
            ->leftjoin('blocklists','blocklists.user_id','users.id')
            ->where([['userinfos.gender','=',$request->gender],['users.account_type','=','Public']])
            ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
            ->paginate(8);
        }
        elseif ($request->city != 'All' && $request->community == null && $request->maritalstatus == null) {
            $users = DB::table('users')
            ->join('userinfos','userinfos.user_id','users.id')
            ->select('*','users.id as user_id')
            ->leftjoin('blocklists','blocklists.user_id','users.id')
            ->where([['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['users.account_type','=','Public']])
            ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
            ->paginate(8);
        }
           
        elseif ($request->city == 'All' && $request->community == null) {
            $users = DB::table('users')
            ->join('userinfos','userinfos.user_id','users.id')
            ->select('*','users.id as user_id')
            ->leftjoin('blocklists','blocklists.user_id','users.id')
            ->where([['userinfos.gender','=',$request->gender],['userinfos.merital_status','=',$request->maritalstatus],['users.account_type','=','Public']])
            ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
            ->paginate(8);
        }
        elseif ($request->city == 'All' && $request->maritalstatus == null) {
            $users = DB::table('users')
            ->join('userinfos','userinfos.user_id','users.id')
            ->select('*','users.id as user_id')
            ->leftjoin('blocklists','blocklists.user_id','users.id')
            ->where([['userinfos.gender','=',$request->gender],['userinfos.religion','=',$request->community],['users.account_type','=','Public']])
            ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
            ->paginate(8);
        }
        elseif ($request->city == 'All') {
           $users = DB::table('users')
           ->join('userinfos','userinfos.user_id','users.id')
           ->select('*','users.id as user_id')
           ->leftjoin('blocklists','blocklists.user_id','users.id')
           ->where([['userinfos.gender','=',$request->gender],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus],['users.account_type','=','Public']])
           ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
           ->paginate(8);
       }
       elseif ($request->community == null) {
           $users = DB::table('users')
           ->join('userinfos','userinfos.user_id','users.id')
           ->select('*','users.id as user_id')
           ->leftjoin('blocklists','blocklists.user_id','users.id')
           ->where([['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.merital_status','=',$request->maritalstatus],['users.account_type','=','Public']])
           ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
           ->paginate(8);
       }
       elseif ($request->maritalstatus == null) {
           $users = DB::table('users')
           ->join('userinfos','userinfos.user_id','users.id')
           ->select('*','users.id as user_id')
           ->leftjoin('blocklists','blocklists.user_id','users.id')
           ->where([['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['users.account_type','=','Public']])
           ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
           ->paginate(8);
       }

       else{
           $users = DB::table('users')
           ->join('userinfos','userinfos.user_id','users.id')
           ->select('*','users.id as user_id')
           ->leftjoin('blocklists','blocklists.user_id','users.id')
           ->where([['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus],['users.account_type','=','Public']])
           ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
           ->paginate(8);
       }

        }

        

        return view('search.index',compact('users'));

    }


     // Advanced Search
    public function advancedsearch(Request $request)
    {

       if (Auth::user() ==  true) {

            if ($request->city == 'All' && $request->community == null && $request->maritalstatus == null && $request->body_type == null && $request->blood_group == null && $request->family_values == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            if ($request->city != 'All' && $request->community == null && $request->maritalstatus == null && $request->body_type == null && $request->blood_group == null && $request->family_values == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All' && $request->community == null && $request->body_type == null && $request->blood_group == null && $request->family_values == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.merital_status','=',$request->maritalstatus]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All' && $request->maritalstatus == null && $request->body_type == null && $request->blood_group == null && $request->family_values == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.religion','=',$request->community]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All' && $request->maritalstatus == null && $request->community == null && $request->blood_group == null && $request->family_values == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.body_type','=',$request->body_type]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All' && $request->maritalstatus == null && $request->community == null && $request->body_type == null && $request->family_values == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.blood_group','=',$request->blood_group]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
             elseif ($request->city == 'All' && $request->maritalstatus == null && $request->community == null && $request->body_type == null && $request->blood_group == null) {
                $users = DB::table('users')
                ->join('userinfos','userinfos.user_id','users.id')
                ->select('*','users.id as user_id')
                ->leftjoin('blocklists','blocklists.user_id','users.id')
                ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.family_values','=',$request->family_values]])
                ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                ->paginate(8);
            }
            elseif ($request->city == 'All') {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->community == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.merital_status','=',$request->maritalstatus]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->maritalstatus == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->body_type == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus],['userinfos.blood_group','=',$request->blood_group],['userinfos.family_values','=',$request->family_values]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->blood_group == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus],['userinfos.body_type','=',$request->body_type],['userinfos.family_values','=',$request->family_values]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }
            elseif ($request->family_values == null) {
                 $users = DB::table('users')
                 ->join('userinfos','userinfos.user_id','users.id')
                 ->select('*','users.id as user_id')
                 ->leftjoin('blocklists','blocklists.user_id','users.id')
                 ->where([['users.id','!=',Auth::user()->id],['blocklists.block_id','=',null],['userinfos.gender','=',$request->gender],['userinfos.division','=',$request->city],['userinfos.religion','=',$request->community],['userinfos.merital_status','=',$request->maritalstatus],['userinfos.blood_group','=',$request->blood_group],['userinfos.body_type','=',$request->body_type]])
                 ->whereBetween('userinfos.age',[$request->agefrom, $request->ageto])
                 ->paginate(8);
            }


        }
       

        

        return view('search.index',compact('users'));

    }








    // View Profile
    public function viewprofile($name, $id)
    {
      $user = User::where([['id','!=',Auth::user()->id],['id','=',$id]])->first();
 
      if ($user == null) {
          return redirect('/');
      }
      else{
        $userblock = Blocklist::where([['user_id','=',Auth::user()->id],['block_id','=',$id]])->first();
        if ($userblock != null) {
          return redirect('/');
        }
        else{

            $profilevisitor = Profilevisitor::where([['user_id','=',$id],['visitor_id','=',Auth::user()->id]])->first();

            if ($profilevisitor == null) {
                $profilevisitor = new Profilevisitor();
                $profilevisitor->user_id = $id;
                $profilevisitor->visitor_id = Auth::user()->id;
                $profilevisitor->save();
            }
            else{
                $profilevisitor->updated_at = Carbon::now();
                $profilevisitor->save();
            }

            $galleries = Gallery::where('user_id','=',$user->id)->get();
            return view('search.viewprofile',compact(['user','galleries']));
        }
      }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
