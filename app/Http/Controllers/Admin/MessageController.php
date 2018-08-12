<?php

namespace App\Http\Controllers\Admin;

use App\Adminmessage;
use App\Meeting;
use App\Message;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Validator;


class MessageController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Show all Message
    public function index()
    {
    	$messages  = DB::table('users')
                   ->join('messages','messages.user_id','=','users.id')
                   ->where('messages.admin_id','=',null)
                   ->orderBy('messages.created_at', 'desc')
                   ->get();

      $messages = $messages->unique('user_id');

      $adminchats = DB::table('adminmessages')
                   ->join('admins','admins.id','=','adminmessages.admin_id')
                   ->get();

      return view('admin.message.index',compact('messages','adminchats'));
    }

    public function chat($id)
    {
      
      $messages = Message::where('user_id','=',$id)->orderBy('created_at', 'desc')->get();

      $user = User::find($id);
      $admin = Auth::guard('admin')->user();

      $adminchat = Adminmessage::where([['user_id','=',$id],['admin_id','=',Auth::guard('admin')->user()->id]])->first();
      if ($adminchat == null) {
        $adminchat = new Adminmessage(); 
        $adminchat->user_id = $id;
        $adminchat->admin_id = Auth::guard('admin')->user()->id;
        $adminchat->save();
      }
      
      return view('admin.message.chat',compact('messages','admin','user'));
    }

    public function sendmessage(Request $request)
    {

      $message = new Message();
      $message->user_id = $request->id;
      $message->admin_id = Auth::guard('admin')->user()->id;
      $message->message = $request->message;
      $message->save();

      return Response()->json(200);

    }


     public function getmessage(Request $request)
    {
        $messages = DB::table('messages')
          ->where([['admin_id','=',null],['seen','=','0']])
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%h:%i %p") as created_at'))
          ->get();

        
        foreach ($messages as $key => $message) {
            $message = Message::find($message->id);
            $message->seen = '1';
            $message->save();
        }

        return Response()->json($messages);
    }


    public function closechat($id)
    {
      $adminchat = Adminmessage::where([['user_id','=',$id],['admin_id','=',Auth::guard('admin')->user()->id]])->first();

      $adminchat->delete();

      return redirect('/matchup/message');
    }


   

}
