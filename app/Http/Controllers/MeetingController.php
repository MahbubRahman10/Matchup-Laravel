<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meeting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile_id' => 'required',
            'phone' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }


        $auth = Auth::user();

        if($auth == null){
            $validator->errors()->add('login', 'You must be register user to book meeting online');
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::where('profile_id','=',$request->profile_id)->first();



        if ($user == null || $request->profile_id == Auth::user()->profile_id) {
            $validator->errors()->add('profile_id', 'Invalid Profile Id');
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $meeting = new Meeting();
        $meeting->user_id = Auth::user()->id;
        $meeting->name = $request->name;
        $meeting->profile_id = $request->profile_id;
        $meeting->phone = $request->phone;
        $meeting->date = $request->date;
        $meeting->message = $request->message;
        $meeting->save();

        return back()->with('success', 'Your request for meeting has been accepted. We will contact with you as soon as possible.');
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
