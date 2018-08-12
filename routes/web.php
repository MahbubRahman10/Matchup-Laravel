<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/EmailConfirm', function () {
	return view('emails.confirmmessage');	
});
Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 
Route::get('/logout','Auth\LoginController@logout');



// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','IndexController@index')->name('index');

Route::get('/search','SearchController@index')->name('search');

Route::get('/membership','MemberController@index')->name('member');

Route::get('/meeting','MeetingController@index')->name('meeting');

Route::get('/message','MessageController@index')->name('msg');


Route::get('/faq', function () {
	return view('faq');	
});

Route::get('/privacy', function () {
	return view('privacy');	
});

Route::get('/contact', function () {
	return view('contact');	
});

Route::get('/searchs', function () {
	return view('search');	
});
Route::get('/advancedsearch', function () {
	return view('advancedsearch');
});

Route::get('/test', function () {
	return view('auth.passwords.mail');	
});

Route::get('/set', function () {
	return view('auth.passwords.set');	
});


// Quick Search
Route::get('/searchs','SearchController@index');
// Advanced Search
Route::get('/searchs/profile','SearchController@advancedsearch');
// View User Profile
Route::get('/user/profile/{name}/{id}','SearchController@viewprofile');

// Block User
Route::get('/block/user/{id}','UserController@blockuser');
// Unblock User
Route::get('/unblock/user/{id}','UserController@unblockuser');



// Subscribe
Route::post('/subscribe','SubscribeController@index');






// User Profile
Route::get('/profile/user','UserController@index');
// User Admin Chat
Route::get('/profile/inbox','UserController@userinbox');

// User Chat
Route::get('/profile/chat','UserController@userchat');
Route::get('/profile/chat/{name}/{id}','UserController@letsuserchat');
Route::get('/profile/chat/send','UserController@sendusermessage');
Route::get('/profile/chat/getmsg','UserController@getusermessage');


// User Profile edit
Route::get('/profile/edit','UserController@editprofile');
Route::post('/profile/edit','UserController@updateprofile');

// Update User Profile
Route::get('/profile/setting','UserController@setting');
Route::post('/profile/setting/password','UserController@changepassword');

// User Photo Gallery
Route::get('/profile/gallery','UserController@gallery');
Route::post('/profile/gallery/add','UserController@addtogallery');
Route::get('/profile/gallery/delete','UserController@deletegalleryimage');

// User Block List
Route::get('/profile/block-list','UserController@blocklist');
Route::get('/profile/block-list/undo/{id}','UserController@undoblocklist');

// User Membership
Route::get('/profile/membership','UserController@membership');




// Membership Online
Route::get('/membership/online','MemberController@showonlineform')->middleware('auth');
Route::get('/membership/online/getlevel','MemberController@getlevel')->middleware('auth');
Route::post('/membership/online/payment','MemberController@paymentoption')->middleware('auth');
Route::get('/membership/online/payment', function () {
	return view('membership.payment');	
})->middleware('auth');
Route::post('/membership/payment','MemberController@payment')->middleware('auth');
Route::get('/membership/payment/confirm', function () {
	return view('membership.confirmpayment');	
})->middleware('auth');
Route::post('/membership/payment/confirm','MemberController@confirmpayment')->middleware('auth');
Route::get('/membership/confirmpayment','MemberController@confirm')->middleware('auth');

Route::get('/membership/payment/success', function () {
	return view('membership.paymentsuccess');
})->middleware('auth');



Route::post('/meeting','MeetingController@create')->middleware('auth');




/*Chat*/
Route::get('/matchup/chat/message/send','ChatController@send');
Route::get('/matchup/chat/message/getmsg','ChatController@getmsg');




//////////////// Admin Auth    ///////////
$this->get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
$this->post('admin/register', 'AdminAuth\RegisterController@register');

$this->get('/matchup/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
$this->post('admin/login', 'AdminAuth\LoginController@login');
Route::GET('admin/logout', 'AdminAuth\LoginController@logout');

        // Registration Routes...
// $this->get('admin/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
// $this->post('admin/register', 'AdminAuth\RegisterController@register');

        // Password Reset Routes...
$this->get('admin/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
$this->post('admin/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
$this->get('admin/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');
$this->post('admin/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.request');



Route::middleware(['auth:admin'])->group(function () {


	// Admin Panel
	Route::get('/matchup/dashboard','Admin\IndexController@index');


	// user
	Route::get('/matchup/user','Admin\UserController@index');
	// View user
	Route::get('/matchup/user/view/{id}','Admin\UserController@view');
	// ban user
	Route::get('/matchup/user/banuser','Admin\UserController@banuser');
	// unban user
	Route::get('/matchup/user/unbanuser','Admin\UserController@unbanuser');
	// search user
	Route::get('/matchup/user/search','Admin\UserController@search');


	// Guest Message
	Route::get('/matchup/guestmessage','Admin\GuestController@index');
	// Show Guest Message
	Route::get('/matchup/guestmessage/view/{id}','Admin\GuestController@show');
	// Add Guest Message
	Route::get('/matchup/guestmessage/add','Admin\GuestController@add');
	Route::post('/matchup/guestmessage/add','Admin\GuestController@create');
	// Edit Guest Message
	Route::get('/matchup/guestmessage/edit/{id}','Admin\GuestController@edit');
	Route::post('/matchup/guestmessage/edit/{id}','Admin\GuestController@update');
	// Delete Guest Message
	Route::get('/matchup/guestmessage/delete','Admin\GuestController@destroy');
	// Search message
	Route::get('/matchup/guestmessage/search','Admin\GuestController@search');



	// Success Story
	Route::get('/matchup/success-story','Admin\SuccessController@index');
	// Show Success Story
	Route::get('/matchup/success-story/view/{id}','Admin\SuccessController@show');
	// Add Success Story
	Route::get('/matchup/success-story/add','Admin\SuccessController@add');
	Route::post('/matchup/success-story/add','Admin\SuccessController@create');
	// Edit Success Story
	Route::get('/matchup/success-story/edit/{id}','Admin\SuccessController@edit');
	Route::post('/matchup/success-story/edit/{id}','Admin\SuccessController@update');
	// Delete Success Story
	Route::get('/matchup/success-story/delete','Admin\SuccessController@destroy');
	// Search Success Story
	Route::get('/matchup/success-story/search','Admin\SuccessController@search');



	// Subscribers
	Route::get('/matchup/subscriber','Admin\SubscribeController@index');
	// Delete Subscriber
	Route::get('/matchup/subscriber/delete','Admin\SubscribeController@destroy');
	// Search Subscriber
	Route::get('/matchup/subscriber/search','Admin\SubscribeController@search');


	// Membership
	Route::get('/matchup/membership','Admin\MembershipController@index');
	// Membership Bank Slip Download
	Route::get('/matchup/membership/bank/{id}','Admin\MembershipController@download');
	// Membership Approved
	Route::get('/matchup/membership/approved/{id}','Admin\MembershipController@approved');
	// Membership Reject
	Route::get('/matchup/membership/reject/{id}','Admin\MembershipController@reject');
	// Membership Search
	Route::get('/matchup/membership/search','Admin\MembershipController@search');



	// Membership Level Setting
	Route::get('/matchup/membershiplevel','Admin\MembershipController@membershipsetting');
	Route::post('/matchup/membershiplevel/setting/add','Admin\MembershipController@addmembershiplevel');
	Route::post('/matchup/membershiplevel/setting/edit','Admin\MembershipController@editmembershiplevel');
	Route::get('/matchup/membershiplevel/setting/delete','Admin\MembershipController@deletemembershiplevel');
	Route::get('/matchup/membershiplevel/setting/search','Admin\MembershipController@membershiplevelsearch');





	// Meeting
	Route::get('/matchup/meeting','Admin\MeetingController@index');
	Route::get('/matchup/meeting/view/{id}','Admin\MeetingController@view');
	// Delete Meeting
	Route::get('/matchup/meeting/delete','Admin\MeetingController@destroy');
	// Search Meeting
	Route::get('/matchup/meeting/search','Admin\MeetingController@search');


	// Message
	Route::get('/matchup/message','Admin\MessageController@index');
	Route::get('/matchup/message/chat/{id}','Admin\MessageController@chat');
	Route::get('/admin/matchup/message/chat/send','Admin\MessageController@sendmessage');
	Route::get('/admin/matchup/message/chat/getmsg','Admin\MessageController@getmessage');	
	Route::get('/matchup/message/chat/close/{id}','Admin\MessageController@closechat');





	// admin
	Route::get('/matchup/admin','Admin\AdminController@index');
	// View admin
	Route::get('/matchup/admin/view/{id}','Admin\AdminController@view');
	// Add Success Story
	Route::get('/matchup/admin/add','Admin\AdminController@add');
	Route::post('/matchup/admin/add','Admin\AdminController@create');
	// Delete admin
	Route::get('/matchup/admin/delete','Admin\AdminController@destroy');
	// search admin
	Route::get('/matchup/admin/search','Admin\AdminController@search');
	// Admin Profile
	Route::get('/matchup/admin/profile','Admin\AdminController@profile');
	// Change Image Save
	Route::post('/matchup/profile/image','Admin\AdminController@changeprofileimg');
	// Change Admin Password
	Route::post('/matchup/profile/changepassword','Admin\AdminController@changepassword');




});