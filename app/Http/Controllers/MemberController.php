<?php

namespace App\Http\Controllers;

use App\Membership;
use App\Membershiplevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membershiplevels = Membershiplevel::all();
        return view('member',compact('membershiplevels'));
    }


    // Show Membership Online Form
    // public function showonlineform()
    // {
    //     $user = Auth::user();
    //     $membershiplevels = Membershiplevel::all();
    //     return view('membership.index',compact(['user','membershiplevels']));
    // }

    // Get Level
    // public function getlevel(Request $request)
    // {
    //     $level = Membershiplevel::find($request->id);
    //     return Response()->json($level);
    // }

    // Show payment Option
    public function paymentoption(Request $request)
    {
        session()->put('memid', $request->memid);

        return redirect('/membership/online/payment');
    }

    // Payment
    public function payment(Request $request)
    {
        session()->put('payment', $request->payment);
        return redirect('/membership/payment/confirm');
    }

    // Confirm Payment
    public function confirmpayment(Request $request)
    {

        $paymentmethod = Session::get('payment');
        $memid = Session::get('memid');
        
        $membership = new Membership();
        $membership->user_id = Auth::user()->id;
        $membership->payment_option = $paymentmethod;
        
        if ($paymentmethod == 'bank') {
           $file = Input::file('bank');
           $destinationPath = 'payment/bank';
           $image = $file->getClientOriginalName();
           $upload_success = $file->move($destinationPath, $image);
           $membership->bank_slip = $upload_success; 

        }
        else{
            $membership->transaction_id = $request->transaction_id;
        }

        $membership->membershiplevel_id = $memid;
        $membership->save();

        return redirect('/membership/payment/success');


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
