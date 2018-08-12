@extends('admin.layouts.admin')

@section('title')
	<title>Dashboard | cs</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	@section('content')
	
	{{-- {!! Charts::styles() !!} --}}

	<div class="container" style="width: auto;margin-top: 2%;">    
		<div class="col-md-12" >
			<div class="col-md-4" id="newusers">
				<i class="pull-left fa fa-eye user1 icon-rounded" style="background-color: #6FB3E0;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;">
				</i>
				<div class="userinfo" style="margin-left: 75px;">
					<h3 style="margin-top: 0px;"><strong> {{$visitors}} </strong></h3>
					<span style="color: #999; font-size: 15px; ">New Visitor(s)</span>
				</div>
			</div>
			<div class="col-md-4" id="newusers">
				<i class="pull-left fa fa-envelope" style="background-color: #1b926c;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;">
				</i>
				<div class="visitorinfo" style="margin-left: 75px;">
					<h3 style="margin-top: 0px;"><strong> {{ $messages }} </strong></h3>
					<span style="color: #999; font-size: 15px; ">New Message(s)</span>
				</div>
			</div>
			<div class="col-md-4" id="newusers">                                
				<i class="pull-left fa fa-shopping-cart" style="background-color: #a2d246;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;">
				</i>
				<div class="info" style="margin-left: 75px;">
					<h3 style="margin-top: 0px;"><strong> {{$orders}} </strong></h3>
					<span style="color: #999; font-size: 15px; ">New Order(s)</span>                            
				</div>
			</div>                            
		</div>


	{{-- <div style="margin-top: 10%;">
		<div class="col-md-12">
			{!! $chart->html() !!}
			{!! Charts::scripts() !!}
			{!! $chart->script() !!}
		</div>

		<div class="col-md-12" style="margin-top: 2%;">
			<div class="col-md-6">
				{!! $order->html() !!}
				{!! Charts::scripts() !!}
				{!! $order->script() !!}
			</div>

			<div class="col-md-6" id="orderchart">
				{!! $site->html() !!}
				{!! Charts::scripts() !!}
				{!! $site->script() !!}
			</div>
		</div>
	</div> --}}
	

@endsection