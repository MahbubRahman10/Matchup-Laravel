@extends('layouts.master')
@section('title')
    @section('titlename'){{ Auth::user()->name }}
@endsection
@section('content')

	{{-- Profile Style Link  --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
	
	<br>

	<div class="container usercontainer" id="dashboard">
		<div class="col-md-12">	
			<div class="col-md-3" id="usersidebar">
				<div class="user-menu">
					<a href="" class="user-icon">
						<i class="fa fa-bars fa-2x" id="qicon"></i>
					</a>
				</div>
				<div class="user">
					<div class="user-image">
						@if (Auth::user()->image == True)
						    <img src="/{{ Auth::user()->image }}" alt="users">
						@else								
							<img src="{{ asset('img/male.png') }}" alt="users">
						@endif
					</div>
					<div class="user-details">
						<h1>{{ Auth::user()->name }}</h1>
						
					</div>
				</div>
				<hr>
				<div class="sidebar-menu">
					<ul>
						<li><a href="/profile/user"><i class="fas fa-user"></i> Profile </a></li>
						<li><a href="/profile/chat" class="sidebar-menu"><i class="fab fa-facebook-messenger"></i> Chat @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">{{ $chatstatus }}</span>  @endif </a></li>
						<li><a href="/profile/inbox" class="sidebar-menu"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif</a></li>
						<li><a href="/profile/edit" class="sidebar-menu"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu active"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu"><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-9" id="usercontent">		


				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="usersetting">
					@if (\Session::has('success'))
					<div class="alert alert-success">
						<ul>
							<li style="list-style: none;">{!! \Session::get('success') !!}</li>
						</ul>
					</div>
					@endif
					
					<h2>Change Password</h2>
					<br>
					@if (Session::has('msg'))
					<div id="settingalert" class="alert alert-info">{!! Session::get('msg') !!}</div>
					@endif
					<form method="post" action="/profile/setting/password">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<br>
						<h6><label>Old Password :</label></h6>
						<div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
							<input  type="password" class="form-control" name="oldpassword"  style="width: 250px;">
							@if ($errors->has('oldpassword'))
							<span class="help-block">
								<strong>{{ $errors->first('oldpassword') }}</strong>
							</span>
							@endif
						</div>
						<br>
						<h6><label>New Password :</label></h6>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="password" class="form-control" name="password"  style="width: 250px;">

							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
						<br>
						<h6><label>Confirm Password :</label></h6>
						<div class="form-group">
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation"  style="width: 250px;">
							</div>
						</div>
						<br><br><br>
						<button class="btn btn-success">Change</button>
					</form> 

				</div>
			</div>
		</div>
	</div>
@endsection



