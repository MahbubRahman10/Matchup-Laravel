@extends('admin.layouts.master')

@section('title')
	<title>View Success Story | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Success Story</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/success-story">Success Story</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>View Success Story</a>
				</li>
			</ul>

			{{-- Content --}}
			<br>
			
			<div>
				<h3>Title</h3>
				<p>{{ $successstory->title }}</p>
			</div>
			<br>
			<div>
				<h3>Image</h3>
				<img src="/{{ $successstory->image }}" height="200" width="200">
			</div>
			<br>
			<div>
				<h3>Description</h3>
				<p>{{ $successstory->description }}</p>
			</div>
		</div>
	</div>




	
	

@endsection