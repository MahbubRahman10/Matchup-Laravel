<?php

namespace App\Http\Controllers;

use App\Blocklist;
use App\Charts\UserChart;
use App\Education;
use App\Gallery;
use App\Message;
use App\User;
use App\Userchat;
use App\Userinfo;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $activity;

    public function __construct()
    {
    }

    public function index()
    {
      $id = Auth::id();
      $user = User::find($id);

      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();

      // Visitor Chart
      $now = date('Y-m-d h:m:s ' , strtotime('-10 days'));
      $items = array();
      $totals = array();
      $j=DB::table('profilevisitors')
      ->select(DB::raw('DATE(updated_at) as date'), DB::raw('count(*) as views'))
      ->where('created_at','>=', $now)
      ->groupBy('date')
      ->get();
      $result = count($j);
      for ($i=0; $i <$result; $i++) { 
        $items[$i]=$j[$i]->date;
        $totals[$i]=$j[$i]->views;
      }

      $visitor = new UserChart;
      $visitor->dataset('Profile Visitor', 'line', $totals)->options(['backgroundColor' => '#269FC7']);;
      $visitor->labels($items);
      $visitor->width('800');
      $visitor->height('250');

      return view('users.profile',compact(['user','visitor','messagesstatus','chatstatus']));
    }

    // User  Chat
    public function userchat()
    { 

      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();

      $id = Auth::id();
      $user = User::find($id);
      $datas = array();
      
      $data1 = DB::table('userchats')
      ->select(DB::raw('destination_id as destination'), DB::raw('count(*) as total'))
      ->where('user_id','=',$id)
      ->groupBy('destination_id')
      ->get();

      $data2 = DB::table('userchats')
      ->select(DB::raw('user_id as destination'), DB::raw('count(*) as total'))
      ->where('destination_id','=',$id)
      ->groupBy('user_id')
      ->get();

      $datas = $data1;
      $datas = $data2;

      $chats = array();
      $totalresult = count($datas);
      $totalresult = $totalresult - 1;
      for ($i=$totalresult; $i >= 0; $i--) { 
        $destination = User::find($datas[$i]->destination);

        $block1 = Blocklist::where([['user_id','=',$id],['block_id','=',$destination->id]])->first();
        $block2 = Blocklist::where([['user_id','=',$destination->id],['block_id','=',$id]])->first();

        if ($block1 != null || $block2 != null) {
          
        }
        else{
          $chats[$i]['id']= $destination->id;
          $chats[$i]['name']= $destination->name;

          $data1 = Userchat::where([['user_id','=',$id],['destination_id','=',$destination->id]])->orderby('created_at','desc')->first();
          $data2 = Userchat::where([['destination_id','=',$id],['user_id','=',$destination->id]])->orderby('created_at','desc')->first();

          if ($data1 == null) {
            $chats[$i]['message']= $data2->message;
            $chats[$i]['seen']= '0';
          }
          elseif ($data2 == null) {
            $chats[$i]['message']= $data1->message;
            $chats[$i]['seen']= '0';
          }
          else{
            if (Carbon::parse($data1->created_at) > Carbon::parse($data2->created_at)) {          
              $chats[$i]['message']= $data1->message;
              if($data1->seen == '0'){
                $chats[$i]['seen']= '0';
              }
              else{
                $chats[$i]['seen']= '1';
              }
            }
            else{
              $chats[$i]['message']= $data2->message;
              if($data2->seen == 0){
                $chats[$i]['seen']= '0';
              }
              else{
                $chats[$i]['seen']= '1';
              }
            }
          } 

        }

      

      }


      return view('users.chat',compact('user','chats','messagesstatus','chatstatus'));
    }


    // Show Chat Page with User
    public function letsuserchat($name,$chatid)
    {

      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();

      $id = Auth::id();
      $user = User::find($id);
      $destination = User::find($chatid);

      $block1 = Blocklist::where([['user_id','=',$id],['block_id','=',$destination->id]])->first();
      $block2 = Blocklist::where([['user_id','=',$destination->id],['block_id','=',$id]])->first();

      if ($block1 != null || $block2 != null) {
        return Redirect('/');
      }
      else{
        $send = Userchat::where([
          ['user_id', '=', $id],
          ['destination_id', '=', $chatid ],
          ['seen', '=', '1'],
        ])->get();

        $recieve = Userchat::where([
          ['user_id', '=', $chatid ],
          ['destination_id', '=', $id],
          ['seen', '=', '1'],
        ])->get();

        if (count($send) ==  0 && count($recieve) == 0) {
          $oldmessages = 0;
        }
        else{
          for ($i=0; $i < count($send) ; $i++) { 
            $oldmessages[$i]  = $send[$i];
          }
          $total = count($send)+count($recieve); 
          $i = 0;
          for ($j= count($send); $j < $total  ; $j++) { 
            $oldmessages[$j]  = $recieve[$i];
            $i++;
          }
          sort($oldmessages);

          $arraySize = sizeof($oldmessages);
          $arraySize = $arraySize-1;

          $j= 0;
          for($i=$arraySize; $i>=0; $i--){
            $datas[$j] = $oldmessages[$i];
            $j++; 
          };
          $oldmessages = $datas;
        }
      
        Session::put('destination_id',$destination->id);

        return view('users.chatview',compact('user','destination','messagesstatus','oldmessages','chatstatus'));
      }
    }


    // Send User Message
    public function sendusermessage(Request $request)
    {
      
      $userchat = new Userchat();
      $userchat->destination_id = $request->id;
      $userchat->user_id = Auth::user()->id;
      $userchat->message = $request->message;
      $userchat->save();

      return Response()->json(200);
    }

    // Get User Message
    public function getusermessage(Request $request)
    {

        $messages = DB::table('userchats')
          ->where([['destination_id','=',Auth::user()->id],['user_id','=',Session::get('destination_id')],['seen','=','0']])
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%h:%i %p") as created_at'))
          ->get();

        
        foreach ($messages as $key => $message) {
            $message = Userchat::find($message->id);
            $message->seen = '1';
            $message->save();
        }


        return Response()->json($messages);
    }

    // User  Admin Inbox
    public function userinbox()
    {
      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();

      $id = Auth::id();
      $user = User::find($id);

      $messages = Message::where('user_id','=',$id)->orderby('created_at','desc')->get();
      
      foreach ($messages as $key => $message) {
        if ($message->seen == '0') {
          $message = Message::find($message->id);
          $message->seen = '1';
          $message->save();
        }
      }

      return view('users.inbox',compact('user','messages','status','messagesstatus','chatstatus'));
    }

    // Edit Profile Page
    public function editprofile()
    {
      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();
      $id = Auth::id();
      $user = User::find($id);
      return view('users.editprofile',compact('user','messagesstatus','chatstatus'));
    }

    // Update Profile
    public function updateprofile(Request $request)
    {


      $id = Auth::id();
      $user=User::find($id);

      $userinfo = Userinfo::where('user_id','=',$id )->first();

      // Validation
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'annual_income' => 'numeric'
      ]);

      if ($validator->fails()) {
        return back()
        ->withErrors($validator)
        ->withInput();
      }


      $user->account_type=$request->account_type;
      $user->name=$request->name;
      $user->phone=$request->phone;   
      $userinfo->date_of_birth=$request->date_of_birth;
      $userinfo->age=$request->age; 
      $userinfo->profile_create=$request->profile_create; 
      $userinfo->merital_status=$request->status;
      $userinfo->height=$request->height;
      $userinfo->weight=$request->weight; 
      $userinfo->blood_group=$request->blood_group;
      $userinfo->body_type=$request->body_type;
      $userinfo->drink=$request->drink;
      $userinfo->smoke=$request->smoke;
      $userinfo->occupation=$request->occupation;
      $userinfo->annual_income=$request->annual_income;
      $userinfo->fathers_occupation=$request->fathers_occupation;
      $userinfo->mothers_occupation=$request->mothers_occupation;
      $userinfo->brothers=$request->brothers;
      $userinfo->sisters=$request->sisters;
      $userinfo->children=$request->children;
      $userinfo->mother_tongue=$request->mother_tongue;
      $userinfo->family_values=$request->family_values;
      $userinfo->country=$request->country;
      $userinfo->residential_status=$request->residential_status;
      $userinfo->address=$request->address;
      $userinfo->division=$request->division;
      $userinfo->district=$request->district;
      $userinfo->about=$request->about;

      // IF EXIST
      $files = $request->image;
      if($files==TRUE){
        $destinationPath = 'Profile';
        $filename = $files->getClientOriginalName();
        $upload_success = $files->move($destinationPath, $filename);
        $user->image=$upload_success;
      }

      $user->save();
      $userinfo->save();

      $i = 0;
      
      if($request->degree_name != null){
        foreach ($request->degree_name as $key => $degree) {

          $educations = Education::where([['user_id','=',Auth::user()->id],['degree_name','=',$degree]])->first();
          if ($request->institute[$i] == null || $request->passing_year[$i] == null) {
            $validator->errors()->add('educationerrors', 'please fill in all the required education fields properly');
            return back()
            ->withErrors($validator)
            ->withInput();
          }
          elseif ($educations == null) {
            $education = new Education();
            $education->user_id = $user->id;
            $education->degree_name = $degree;
            $education->institution = $request->institute[$i];
            $education->passing_year = $request->passing_year[$i];
            $education->save();
          }
          else{
            $education = Education::where([['user_id','=',Auth::user()->id],['degree_name','=',$degree]])->first();
            $education->institution = $request->institute[$i];
            $education->passing_year = $request->passing_year[$i];
            $education->save();
          }

          $i++;
        }
      }

      return back()->with('success', 'Successfully Updated!');

    }

    // Account Setting Page
    public function setting()
    {
      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();
      $id = Auth::id();
      $user = User::find($id);
      return view('users.setting',compact('user','messagesstatus','chatstatus'));
    }

    // Change Password
    public function changepassword(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'oldpassword' => ' required',
        'password' => 'required|string|min:6|confirmed',
      ]);
      // Validation
      if ($validator->fails()) {
        return back()
        ->withErrors($validator)
        ->withInput();
      }

      $current_password = Auth::User()->password;
      if(Hash::check($request->oldpassword, $current_password))
        {           
          $user_id = Auth::User()->id;                       
          $user = User::find($user_id);

          $user->password =bcrypt($request->password);
          $user->save();

          return back()->with('msg', 'Your password has been changed successfully!');
        }
        else{
          $validator->errors()->add('oldpassword', 'Please enter the correct password');
          return back()
          ->withErrors($validator)
          ->withInput();
        }
    }

    // Photo Gallery Page
    public function gallery($value='')
    {
      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();
      $id = Auth::id();
      $galleries = Gallery::where('user_id','=',$id)->orderby('created_at','desc')->get();
      return view('users.gallery',compact('galleries','messagesstatus','chatstatus')); 
    }

    // Add Photo to Gallery
    public function addtogallery(Request $request)
    {
      $id = Auth::id();

      $validator = Validator::make($request->all(), [
        'image' => ' required',
      ]);
      // Validation
      if ($validator->fails()) {
        return back()
        ->withErrors($validator)
        ->withInput();
      }

      
      foreach ($request->image as $key => $file) {
        $gallery = new Gallery();
        $gallery->user_id = $id;
        $destinationPath = 'gallery';
        $filename = $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $filename);
        $gallery->image=$upload_success;
        $gallery->save();
      }
      
      return Redirect()->back();

    }


    // Delete Gallery Image
    public function deletegalleryimage(Request $request)
    {
      $gallery = Gallery::find($request->id);
      $gallery->delete();
      return Response()->json(200);
    }


    // User Block List
    public function blocklist()
    {
      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();
      $id = Auth::id();
      $blocklists = DB::table('users')
                    ->join('blocklists','blocklists.block_id','=','users.id')
                    ->where('blocklists.user_id','=',$id)
                    ->orderby('blocklists.created_at','desc')
                    ->get();

      return view('users.blocklist',compact('blocklists','messagesstatus','chatstatus')); 
    }

    // Undo Block User
    public function undoblocklist($id)
    {
      $blocklist = Blocklist::where('block_id','=',$id)->first();
      $blocklist->delete();

      return Redirect()->back();
    }

    public function blockuser($id)
    {
      $blockuser = new Blocklist;
      $blockuser->user_id = Auth::user()->id;
      $blockuser->block_id = $id;
      $blockuser->save();

      return redirect('/profile/block-list')->with('msg', 'Block Successfully!');
    }

    public function unblockuser($id)
    {

      $blockuser = Blocklist::find($id);
      $blockuser->delete();

      return redirect('/profile/block-list')->with('msg', 'Unblock Successfully!');
    }


    // Membership
    public function membership()
    {
      $messagesstatus = $this->messagesstatus();
      $chatstatus = $this->chatstatus();
      $user = User::find(Auth::user()->id);
      return view('users.membership',compact('user','messagesstatus','chatstatus'));
    }

    // Message Status
    public function messagesstatus()
    {
      $messages  = DB::table('users')
      ->join('messages','messages.user_id','=','users.id')
      ->where([['messages.admin_id','!=',null],['messages.seen','=','0']])
      ->orderBy('messages.created_at', 'desc')
      ->get();
      
      if (count($messages) == '0') {
        return '0';
      }
      else{
        return '1';
      }
    }

    // Chat Status
    public function chatstatus()
    {
      $messages  = DB::table('userchats')
      ->where([['destination_id','=', Auth::user()->id],['seen','=', '0']])
      ->select(DB::raw('user_id as user_id'), DB::raw('count(*) as views'))
      ->groupBy('user_id')
      ->get();
      


      $totalmessage = count($messages);


      if ($totalmessage == '0') {
        return '0';
      }
      else{
        return $totalmessage;
      }

    }


}
