<?php

namespace App\Http\Controllers\AdminAuth;

use Mail;
use App\Admin;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/';


    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function register(Request $request)
    {
        // User Register validation
        // $validator = $this->validator($request->all());
        // if ($validator->fails()) 
        // {
        //     $this->throwValidationException($request, $validator);
        // }
       
        // I don't know what I said in the last line! Weird!
        // DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());
            // // After creating the user send an email with the random token generated in the create method above
            // $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            // Mail::to($user->email)->send($email);
            // DB::commit();
            return redirect()->to("/EmailConfirm");
        }
        catch(Exception $e)
        {
            // DB::rollback(); 
            return back();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return Admin::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        // ]);

        onnorokom_sms(['message' => 'Hello Mahbub', 'mobile_number' => '+8801759034666']);
        
    }

    
}
