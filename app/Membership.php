<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function membershiplevel()
    {
        return $this->belongsTo('App\Membershiplevel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
