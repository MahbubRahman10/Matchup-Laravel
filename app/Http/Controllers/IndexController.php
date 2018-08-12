<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guestmessage;
use App\Story;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestmessages = Guestmessage::limit('2')->get();
        $stories = Story::limit('3')->get();

        return view('index',compact('guestmessages','stories'));
    }
}
