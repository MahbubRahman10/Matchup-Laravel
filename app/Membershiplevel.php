<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membershiplevel extends Model
{
    public function membership()
    {
        return $this->hasOne('App\Membership');
    }
}
