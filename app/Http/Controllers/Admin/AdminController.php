<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Mail\Adminmail;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Validator;


class AdminController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
    	$admins  = Admin::Orderby('created_at','=','desc')->get();
        return view('admin.admin.index',compact('admins'));
    }

    // view Add Admin Page
    public function add()
    {
      if (Auth::guard('admin')->user()->role == 'Superadmin'){
        return view('admin.admin.addadmin');
      }
      else{
        return redirect('/matchup/dashboard'); 
      }
     
    }

    // Add Admin
    public function create(Request $request)
    {
      // Validation
      $data = Input::all();                 
      $rules=array(
        'name' => 'required',
        'email' => 'required|unique:admins',  
        'role' => 'required|not_in:-1'
      );
      $valid=Validator::make($data,$rules);
      if($valid->fails()){
        return Redirect()->back()->withErrors($valid)->withInput($request->all);
      }

      $admin = new Admin();
      $admin->name = ucfirst($request->name);
      $admin->email = $request->email;
      $admin->role = $request->role;
      $password = $this->password();
      $admin->password = bcrypt($password);
      $admin->save();


      $email = new Adminmail($admin->name,$admin->email,$password);
      Mail::to($admin->email)->send($email);

      return redirect('/matchup/admin');

    }

    // View Admin
    public function view($id)
    {
    	$admin  = Admin::find($id);
    	return view('admin.admin.view',compact('admin'));
    }

    // Delete Admin
    public function destroy(Request $request)
    {
    	$admin = Admin::find($request->id);
    	$admin->delete();
    	return Response()->json(200);
    }

    // Search Admin
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('admins')
          ->orderBy('created_at', 'desc')
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('admins')
          ->where('name','LIKE',"%{$search}%")
          ->Orwhere('role','LIKE',"%{$search}%")
          ->Orwhere('email','LIKE',"%{$search}%")
          ->Orwhere('phone','LIKE',"%{$search}%")
          ->orderBy('created_at', 'desc')
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }

    // Admin Profile
    public function profile()
    {
      $admin  = Auth::guard('admin')->user();
      return view('admin.admin.profile',compact('admin'));
    }

    // Change Admin Image
    public function changeprofileimg(Request $request)
    {
      $id  = Auth::guard('admin')->user()->id;

      $admin = Admin::find($id);

      $file = Input::file('image');
      $destinationPath = 'admin/upload';
      $image = $file->getClientOriginalName();
      $upload_success = $file->move($destinationPath, $image);
      $admin->image = $upload_success; 

      $admin->save();

      return redirect('matchup/admin/profile');

    }

    // Change Admin Password
    public function changepassword(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'oldpassword' => ' required',
        'password' => 'required|string|min:6|confirmed',
      ]);
      // Validation
      if ($validator->fails()) {
        return back()->with('error', 'Please enter the correct password');
        // return back()
        // ->withErrors($validator)
        // ->withInput();
      }

      $current_password = Auth::guard('admin')->user()->password;
      if(Hash::check($request->oldpassword, $current_password))
        {           
          $admin_id = Auth::guard('admin')->user()->id;                       
          $admin = Admin::find($admin_id);

          $admin->password =bcrypt($request->password);
          $admin->save();

          return back()->with('message', 'Your password has been changed successfully!');
        }
        else{
          return back()->with('error', 'Please enter the correct old password');
        }
      }


      //  Random Password
    public function password()
    {
        $password = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < 6; $i++) {
            $password .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $password;
    }


}
