@extends('admin.layouts.master')

@section('title')
	<title>User | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>User</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/user">User</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>{{ $user->name }}</a>
				</li>
			</ul>

			
			{{-- Content --}}
			<div class="viewuser">
				<img src="/admin/image/download.png" height="200" width="200">
				<br><br>
				<h4>Name : <span>{{ $user->name }}</span></h4>
				<h4>Email : <span>{{ $user->email }}</span></h4>
				<h4>Phone Number : <span>{{ $user->phone }}</span></h4>
				<h4>Joined : <span> {{ Carbon\Carbon::parse($user->created_at)->format('d F Y') }} </span></h4>
			</div>



		</div>
	</div>






@endsection