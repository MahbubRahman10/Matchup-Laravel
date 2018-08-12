<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\EmailVerification;
use App\User;
use App\Userinfo;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        // User Register validation
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());

            if ($request->gender == 'male') {
                $user->image = 'img/male.png';
                $user->save();
            }
            elseif ($request->gender == 'female') {
                $user->image = 'img/female.png';
                $user->save();
            }
            $userinfo = new Userinfo();
            $userinfo->user_id = $user->id;
            $userinfo->gender = $request->gender;
            $userinfo->religion = $request->religion;
            $userinfo->save();




            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['token' => $user->token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);


            DB::commit();
            return redirect()->to("/EmailConfirm");
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|string|max:255',
            'gender' => 'required|not_in:0',
            'religion' => 'required|not_in:0',
            'contact_no' => 'required|regex:/^(?:\+?88)?01[15-9]\d{8}$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'profile_id' => $this->profileid(),
            'name' => $data['full_name'],
            'phone' => $data['contact_no'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(10)
        ]);
    }

    // Verified the User
    public function verify($token)
    {
        $user = User::where('token',$token)->firstOrFail();
        $user->verified = '1';
        $user->token = null;
        $user->save();
        Auth::login($user);
        return redirect('/');
    }

    //  Random Profile Id
    public function profileid()
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited
        for ($i=0; $i < 10; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }


}
