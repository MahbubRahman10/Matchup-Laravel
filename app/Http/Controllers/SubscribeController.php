<?php

namespace App\Http\Controllers;


use App\Subscriber;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    protected $activity;

    public function __construct(){

    }
    
    // Add Subscriber
    public function index(Request $request)
    {

      // Validation
      $validator = Validator::make($request->all(), [
      'email' => 'required|unique:subscribers'
      ]);
      if ($validator->fails()) {
        return Redirect('/#boxes')
        ->withErrors($validator)
        ->withInput();
      }


      $subscribe = new Subscriber();
      $subscribe->email = $request->email;
      $subscribe->save();


      return Redirect('/#boxes')->with('msg', 'Thanks to subscribe!');

      // return back()->with('success', 'Successfully Updated!');

    }


}
