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
							<img src="{{ asset('img/profile-default.jpg') }}" alt="users">
						@endif
					</div>
					<div class="user-details">
						<h1>{{ Auth::user()->name }}</h1>
					</div>
				</div>
				<hr>
				<div class="sidebar-menu">
					<ul>
						<li><a href="#" class="sidebar-menu active"><i class="fas fa-user"></i> Profile </a></li>
						<li><a href="/profile/chat" class="sidebar-menu"><i class="fab fa-facebook-messenger"></i> Chat @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">{{ $chatstatus }}</span>  @endif </a></li>
						<li><a href="/profile/inbox" class="sidebar-menu"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif </a></li>
						<li><a href="/profile/edit"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu"><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-9" id="usercontent">				
				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="home">
					<div class="row">
						<div class="col-md-4">
							<div class="profile-image">
								@if (Auth::user()->image == True)
								<img src="/{{ Auth::user()->image }}" alt="users">
								@else								
								<img src="{{ asset('img/profile-default.jpg') }}" alt="users">
								@endif
							</div>
						</div>
						<div class="col-md-6 user-details">
							<h3>{{ ucfirst($user->name) }} @if($user->userinfo->user_level == 'Gold') <img src="/img/gold.png" height="20" width="20" class="user-level"> @elseif($user->userinfo->user_level == 'Bronze')  <img src="/img/bronze.png" height="20" width="20" class="user-level">  @elseif($user->userinfo->user_level == 'Silver')  <img src="/img/silver.png" height="20" width="20" class="user-level"> @elseif($user->userinfo->user_level == 'Platinum') <img src="/img/platinum.png" height="20" width="20" class="user-level"> @endif </h3>
							<h5>Joined :  {{ Carbon\Carbon::parse($user->created_at)->format('d F Y') }} </h5>
							@if ($user->userinfo->user_level == 'Registered')
								<a href="/membership" class="btn btn-success" style="margin:10px 0px;font-weight: bold; border-radius: 0px;">Upgrade to a paid member</a>
							@endif
							<h3 style="font-size: 19px;">About Me: </h3>
							<p>{{ $user->userinfo->about?$user->userinfo->about:'N/A' }}</p>
						</div>
					</div>
					<div class="row userchart">
						<div class="col-md-12">
							<div class="chartdata" style="background: white; margin-top: 50px;">
								<div>{!! $visitor->container() !!}</div>
							</div>
						</div>
						<script src="{{ asset('/js/Chart.min.js') }}" charset="utf-8"></script>
						{!! $visitor->script() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection



