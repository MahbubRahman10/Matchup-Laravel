@extends('admin.layouts.master')

@section('title')
	<title>View Guest Message | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Guest Message</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/guestmessage">Guest Message</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>View Guest Message</a>
				</li>
			</ul>

			{{-- Content --}}
			<br>
			
			<div>
				<h3>Title</h3>
				<p>{{ $guestmessage->title }}</p>
			</div>
			<br>
			<div>
				<h3>Relation</h3>
				<p>{{ $guestmessage->relation }}</p>
			</div>
			<br>
			<div>
				<h3>Message</h3>
				<p>{{ $guestmessage->message }}</p>
			</div>
		</div>
	</div>




	
	

@endsection