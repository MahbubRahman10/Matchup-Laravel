<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use DB;
use App\Book;
use App\Theater;

class AdminComposer
{
	public function compose(view $view)
	{	  
		
		$meetingstatus = DB::table('meetings')->where('status','=','0')->count();
		$membershipstatus = DB::table('memberships')->where('status','=','pending')->count();
		$userstatus = DB::table('users')->where('seen','=','0')->count();
		
		$messages  = DB::table('users')
		->join('messages','messages.user_id','=','users.id')
		->where([['messages.admin_id','=',null],['messages.seen','=','0']])
		->orderBy('messages.created_at', 'desc')
		->get();
		$messagestatus = $messages->unique('user_id');
		$messagestatus = count($messagestatus);

		$view->with('meetingstatus',$meetingstatus)->with('membershipstatus',$membershipstatus)->with('userstatus',$userstatus)->with('messagestatus',$messagestatus);
	}
}