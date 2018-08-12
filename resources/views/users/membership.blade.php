@extends('layouts.master')
@section('title')
    <style type="text/css">
    	.modal-contents{
    		width: 100%;
    		background: white;
    	}
    </style>
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
						<li><a href="/profile/chat" class="sidebar-menu"><i class="fab fa-facebook-messenger"></i> Chat  @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">{{ $chatstatus }}</span>  @endif
						</a></li>
						<li><a href="/profile/inbox" class="sidebar-menu"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif </a></li>
						<li><a href="/profile/edit" class="sidebar-menu"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu "><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu active"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9" id="usercontent">		
				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="usersetting">
					
					<h2>Membership</h2>
					<br>

					<div class="row" style="margin-top: 0px;">
						<div class="col-md-12">
							@if (\Session::has('msg'))
							<div class="alert alert-success">
								<ul>
									<li style="list-style: none;">{!! \Session::get('msg') !!}</li>
								</ul>
							</div>
							@endif
							
							@if ($user->userinfo->user_level == 'Registered')
								
								<h1 style="text-align: center; "><a href="/membership" class="btn btn-success"> <strong>Need Membership?</strong>  </a></h1>

							@else

{{-- 								{{ $user->membership->membershiplevel }} --}}
			
							<div style="text-align: center;" class="membership">
								
								<h3> Current Level : {{ $user->membership->membershiplevel->level }} </h3>
								<h3> Membership Date : {{ Carbon\Carbon::parse($user->membership->created_at)->format('d F Y') }} </h3>
								<h3> Membership Expiration : {{ Carbon\Carbon::parse($user->membership->created_at)->addDays($user->membership->membershiplevel->time)->format('d F Y') }} </h3>


							</div>


							@endif


						</div>
				</div>
			</div>
		</div>
	</div>




@endsection


