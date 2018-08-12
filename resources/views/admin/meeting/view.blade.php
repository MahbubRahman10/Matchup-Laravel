@extends('admin.layouts.master')

@section('title')
	<title>Meeting | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Meeting</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\matchup\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/meeting">Meeting</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>View</a>
				</li>
			</ul>

			
			{{-- Content --}}
			<div class="viewuser">

				<h2> Meeting Details </h2>
				<br>
				<h4>Name : </span> <a href="/matchup/user/view/{{ $meeting->user_id }}">{{ $meeting->name }} </a> </span> </h4>
				<h4>Email : </span> {{ $user->email }} </span> </h4>
				<h4>Phone : </span> {{ $meeting->name }} </span> </h4>
				<h4>Meeting Date : </span> {{ Carbon\Carbon::parse($meeting->date)->format('d F Y') }} </span> </h4>
				<h4>Message : </span> {{ $meeting->message?$meeting->message:'N/A' }} </span> </h4>


				<br><br>
				<h2> Profile Details </h2>
				<br>
				<h4>Profile Id : </span> <a href="/matchup/user/view/{{ $profile->id }}">{{ $profile->profile_id }}</a></span> </h4>
				<h4>Name : <span> {{ $profile->name }} </span> </h4>
				<h4>Email : <span>{{ $profile->email }}</span></h4>
				<h4>Phone Number : <span>{{ $profile->phone?$profile->phone:'N/A' }}</span></h4>
			</div>



		</div>
	</div>






@endsection