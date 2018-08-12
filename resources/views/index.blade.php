@extends('layouts.master')

<style type="text/css">
	
			.mySlides {display:none;}
		
</style>

@section('content')

	 <section id="newsletter" style="margin-bottom: 50px;">
		 <div class="banner-top">
			<section id="showcase">
				<div class="container">
				<h11 style="font-weight: bold;"> #1 Bangladeshi Matrimonial Website</h11>
			</div>

			<!-- Quick search starts -->
	
	<div class="container search_bottom_pd search_panel">
		<form id="quicksearch" name="quicksearch" action="/searchs" method="get" autocomplete="off" class="">
			<div class="container_inner">
				<div class="container_drop_down">
					<div class="col-sm-2 pd_0 lets-dropdown">
						<div class="container_drop_txt">I'm looking for a</div>

						<select name="gender" id="gender" class="form-control form_dropdown" onchange="toggleAgeByGender(this)">
							<option value="Female" label="Woman" selected="selected">Woman</option>
							<option value="Male" label="Man">Man</option>
						</select>		
					</div>

					<div class="col-sm-2 search_pannel_agg_wrap search_bottom_pd lets-dropdown-right">
						<div class="container_drop_txt">Age From</div>
						<div class="age_wrap">
							<div class="white_txt pull-left">

								<!-- <input type="text" name="agefrom" id="agefrom" class="form-control form_dropdown search_pannel_age" placeholder="18">
 -->
								<select name="agefrom" id="agefrom" class="form-control form_dropdown search_pannel_age">
									<option value="18" label="18" selected="selected">18</option>
									<?php 
									for ($i=19; $i <=70 ; $i++) { 
										echo "<option  value=".$i." label=".$i.">".$i."</option>";
									}
									?>

								</select>				
							</div>

							<div class="search_pannel_to">To</div> 
							<div class="pull-left">

								<!-- <input type="text" name="ageto" id="ageto" class="form-control form_dropdown search_pannel_age" placeholder="25"> -->
								<select name="ageto" id="ageto" class="form-control form_dropdown search_pannel_age">

									<option value="25" label="25" selected="selected">25</option>
									<?php 
									for ($i=26; $i <=70 ; $i++) { 
										echo "<option  value=".$i." label=".$i.">".$i."</option>";
									}
									?>
								</select>				
							</div>
						</div>
					</div>

					<div class="col-sm-2  pd_0 search_bottom_pd lets-dropdown">
						<div class="container_drop_txt">Division</div>

						<select name="city" id="frm-city" class="form-control form_dropdown search_pannel_religion" ">
							<option value="All" label="All">All</option>
							<option value="Barishal" label="Barishal">Barishal</option>
							<option value="Chattagram" label="Chattagram">Chattagram</option>
							<option value="Dhaka" label="Dhaka">Dhaka</option>
							<option value="Khulna" label="Khulna">Khulna</option>
							<option value="Mymensingh" label="Mymensingh">Mymensingh</option>
							<option value="Rangpur" label="Rangpur">Rangpur</option>
							<option value="Rajshahi" label="Rajshahi">Rajshahi</option>
							<option value="Sylhet" label="Sylhet">Sylhet</option>
						</select>
					</div>

					<div class="col-sm-2 pd_0 search_bottom_pd lets-dropdown religion">
						<div class="container_drop_txt">Religion</div>

						<select name="community" id="frm-community" class="form-control form_dropdown search_pannel_religion">
							<option value="" label="Select" selected="selected">Select</option>

							<option value="Islam" label="Islam">Islam</option>
							<option value="Hinduism" label="Hinduism">Hinduism</option>
							<option value="Christian" label="Christian">Christian</option>
							<option value="Buddhist" label="Buddhist">Buddhist</option>
							<option value="Other" label="Other">Other</option>
						</select>						
					</div>
					<div class="col-sm-2 pad_right_0 search_bottom_pd lets-dropdown-right marital_status">
						<div class="container_drop_txt">Marital Status</div>

						<select name="maritalstatus" id="frm-maritalstatus" class="form-control form_dropdown search_pannel_mt">
							<option value="" label="Select" selected="selected">Select</option>
							<option value="Unmarried" label="Unmarried">Unmarried</option>
							<option value="Divorced" label="Divorced">Divorced</option>
							<option value="Widowed" label="Never Married">Widowed</option>
							<option value="Separated" label="Widowed">Separated</option>
						</select>

					</div>

					<div class="col-sm-2 col-xs-12 pd_0 search_bottom_pd">
						<button type="submit" class="search_pannel_lets waves-effect waves-light touch-feedback">Search
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>

	</section>	

		</div>
	</section>



 	

	

 <!-- Guest Message -->
 <div class="animated bounceIn">
 	<div class="bg">
 		<div class="container">
 			<h4>Guest Messages</h4>
 			<div class="heart-divider">
 				<span class="grey-line"></span>
 				<i class="fa fa-heart pink-heart"></i>
 				<i class="fa fa-heart grey-heart"></i>
 				<span class="grey-line"></span>
 			</div>

 			@foreach($guestmessages as $guestmessage)
	 		<div class="col-sm-6">
	 			<div class="bg_left">
	 				<h5>{{ $guestmessage->title }}</h5>
	 				<h6>{{ $guestmessage->relation }}</h6>
	 				<p>{{ $guestmessage->message }}</p>
	 				<ul class="team-socials">
	 					<li><a href="{{ $guestmessage->facebook }}" target="_blank"><span class="icon-social"><i class="fab fa-facebook-f fa1"></i></span></a></li>
	 					<li><a href="{{ $guestmessage->twitter }}" target="_blank"><span class="icon-social"><i class="fab fa-linkedin-in fa1"></i></span></a></li>
	 					<li><a href="{{ $guestmessage->googleplus }}" target="_blank"><span class="icon-social"><i class="fab fa-google-plus-g fa1"></i></span></a></li>
	 				</ul>
	 			</div>
 			</div>
	 		@endforeach
 			<div class="clearfix"></div>
 		</div>
 	</div>
</div>
	
	

	<section id="boxes">
		<div class="container">
			<h1>Subscribe to our newsletter</h1>
			<form method="post" action="/subscribe">
				{{ csrf_field() }}
				<input class="form-control em" name="email" type="email" placeholder="Enter email"><br>
				@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
				@endif
				@if (Session::has('msg'))
				<div class="alert alert-info" style="width: 350px">{!! Session::get('msg') !!}</div>
				@endif
				<button type="submit" class="btn btn-primary bt">Subscribe</button>
			</form>
			<h2>Success Stories</h2>
		</div>
	</section>
	<section id="">
		<div class="container">
			@foreach($stories as $story)
			<div class="col-md-4" >
				<img class="i-img" src="{{ $story->image }}" alt="html5img">
				<h3 class="stories">{{ $story->title }}</h3>
				<p>{{ $story->description }}</p>
			</div>
			@endforeach
		</div>
	</section>




@endsection




