<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_id','name','email','gender','merital_status','age','religion','image','phone','token','verified','district','state','about','weight','user_level','annual_income','blood_group','body_type','date_of_birth','drink','smoke','fathers_occupation','mothers_occupation','brothers','sisters','occupation','profile_create','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function userinfo()
    {
        return $this->hasOne('App\Userinfo');
    }

    public function userchats()
    {
        return $this->hasMany('App\Userchat');
    }

    public function membership()
    {
        return $this->hasOne('App\Membership');
    }

}
