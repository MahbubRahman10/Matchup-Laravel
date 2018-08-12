<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use DB;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class VisitComposer
{
    public function compose(view $view)
    {	  
    	VisitLog::save();
    }
}