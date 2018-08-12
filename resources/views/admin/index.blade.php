@extends('admin.layouts.master')

@section('title')
	<title>Dashboard | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
<div class="row adminindex" style="margin-bottom: 70px;">
	<div class="col-xl-3 col-lg-6 col-12">
		<div class="card">
			<div class="card-content">
				<div class="media align-items-stretch">
					<div class="p-2 text-center bg-primary bg-darken-2">
						<i class="fas fa-eye"></i>
					</div>
					<div class="p-2 bg-gradient-x-primary white media-body">
						<h5>Visitor</h5>
						<h5 class="text-bold-400 mb-0">+ {{ $visiotr }} </h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-12">
		<div class="card">
			<div class="card-content">
				<div class="media align-items-stretch">
					<div class="p-2 text-center bg-danger bg-darken-2">
						<i class="fab fa-bandcamp"></i>
					</div>
					<div class="p-2 bg-gradient-x-danger white media-body">
						<h5>Admin</h5>
						<h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>+ {{ $admin }} </h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-12">
		<div class="card">
			<div class="card-content">
				<div class="media align-items-stretch">
					<div class="p-2 text-center bg-warning bg-darken-2">
						<i class="fab fa-product-hunt"></i>
					</div>
					<div class="p-2 bg-gradient-x-warning white media-body">
						<h5> User </h5>
						<h5 class="text-bold-400 mb-0">+  {{ $user }} </h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-12">
		<div class="card">
			<div class="card-content">
				<div class="media align-items-stretch">
					<div class="p-2 text-center bg-success bg-darken-2">
						<i class="fas fa-rss"></i>
					</div>
					<div class="p-2 bg-gradient-x-success white media-body">
						<h5>Paid</h5>
						<h5 class="text-bold-400 mb-0">+ {{ $paid }}</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	{{-- All Chart --}}
	<div class="container" style="margin-top: 0px; background: white; padding: 10px 0px; border: 1px solid #ddd;">
		<div class="col-md-12">
			<h4 style="text-align: center; font-weight: bold; color: #4c4c4c;" class="percentagemarkingchart">Visitor</h4>
			<div>{!! $visiotrchart->container() !!}</div>
		</div>
		<br>
	</div>
	<br><br>
	<div class="container row">
		<div class="text-center col-md-6">
			<div class="chartdata" style="margin-top: 0px; background: white; padding: 10px 0px; border: 1px solid #ddd;">
				<h4 style="text-align: center; font-weight: bold; color: #4c4c4c;" class="percentagemarkingchart">User Level</h4>
				<div>{!! $userlevel->container() !!}</div>
			</div>
		</div>
		<br>
		<div class="text-center col-md-6">
			<div class="chartdata" style="margin-top: 0px; background: white; padding: 10px 0px; border: 1px solid #ddd;">
				<h4 style="text-align: center; font-weight: bold; color: #4c4c4c;" class="percentagemarkingchart">User By Divison</h4>
				<div>{!! $divisions->container() !!}</div>
			</div>
		</div>
	</div>
	<br>
	<script src="{{ asset('/js/Chart.min.js') }}" charset="utf-8"></script>
	{!! $visiotrchart->script() !!}
	{!! $userlevel->script() !!}	
	{!! $divisions->script() !!}	




@endsection