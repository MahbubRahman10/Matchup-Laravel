@extends('admin.layouts.master')

@section('title')
	<title>Admin | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Admin</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\matchup\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/admin">Admin</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>{{ $admin->name }}</a>
				</li>
			</ul>

			
			{{-- Content --}}
			<div class="viewuser">
				@if(Auth::guard('admin')->user()->image) <img src="/{{ Auth::guard('admin')->user()->image }}" alt="user" style="height: 250px; width: 250px;" id="aimg"> @else <img src="/admin/image/download.png" alt="user" style="height: 250px; width: 250px;" id="aimg"> @endif
				<br><br>
				<h4>Admin Role : <span>{{ $admin->role }}</span></h4>
				<h4>Name : <span>{{ $admin->name }}</span></h4>
				<h4>Email : <span>{{ $admin->email }}</span></h4>
				<h4>Phone Number : <span>{{ $admin->phone }}</span></h4>
				<h4>Joined : <span> {{ Carbon\Carbon::parse($admin->created_at)->format('d F Y') }} </span></h4>
			</div>



		</div>
	</div>






@endsection