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
						<li><a href="" class="sidebar-menu active"><i class="fab fa-facebook-messenger"></i> Chat @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">{{ $chatstatus }}</span>  @endif</a></li>
						<li><a href="/profile/inbox" class="sidebar-menu"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" class="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif </a></li>
						<li><a href="/profile/edit" class="sidebar-menu"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu "><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9" id="usercontent">		
				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="usersetting">
					<h2>Your Inbox</h2>
					<div class="row" id="userchat" style="margin-top: 50px; "><br>
						
						<div class="col-md-12">
							@if (count($chats) == 0)
                               <h3 style="text-align: center;font-weight: bold; color: #4c4c4c;">No Chat Available</h3>
							@else
							@foreach ($chats as $chat)
							<div class="userchat @if($chat['seen'] == '0') userchatseen  @endif">
								<div class="col-md-8" style="margin-bottom: 10px;">
									<a href="/user/profile/{{ $chat['name'] }}/{{ $chat['id'] }}">{{ $chat['name'] }}</a><br>
									<span style="color: #C7C6C6">{{ substr($chat['message'],0,20) }}@if(str_word_count($chat['message']) > 10)... @endif</span>
								</div>
								<div class="col-md-4">
									<a href="/profile/chat/{{ $chat['name'] }}/{{ $chat['id'] }}" class="btn btn-success">Let's Chat</a>
								</div>
								<hr class="chathr">
							</div>
							@endforeach
							@endif



						</div>


						<!--chat_sidebar-->
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection


