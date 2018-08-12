@extends('layouts.master')

@section('content')
<style type="text/css">
header{
	padding-top: 40px;
}
</style>

<div class="grid_3">
	 	<div class="container meetingroomview">
	 		<div class="breadcrumb1">
	 			<ul>
	 				<a href="index.php"><i class="fa fa-home home_1"></i></a>
	 				<span class="divider"> | </span>
	 				<li class="current-page">Meeting Room</li>
	 			</ul>
	 		</div>

	 		<h1><center>Meeting Room</center></h1>
	 		<div>
	 			<p>Need a secure place to meet? MATCHup.Com offers meeting place in our office. We will provide complimentary drinks and snacks to you and your guests. Book online or call our office to make a reservation. Price: Taka 1000.00 ( upto 8 Guests). Taka 100.00 per additional guests.</p>
	 			<address class="addr">
	 				<div class="reservationnumber">
	 					<h3>Resrvation Number</h3>
	 					<span> <i class="fas fa-phone fa-rotate-90"></i> 01714-252870</span>
	 				</div>
	 			</address>
	 		</div>
	 		<br>
	 		
	 		<div class="contact_middle">
		 		<div class="container">
		 			<h1><center>Booking Online</center></h1>
		 			<br>
		 			<form id="contact-form" class="contact-form" method="post" action="/meeting">
		 				{{-- Error --}}
		 				@if ($errors->has('name'))
		 				<span class="help-block">
		 					<div class="alert alert-danger">
		 						<strong>{{ $errors->first('name') }}</strong>
		 					</div>
		 				</span>
		 				@elseif ($errors->has('profile_id'))
		 				<span class="help-block">
		 					<div class="alert alert-danger">
		 						<strong>{{ $errors->first('profile_id') }}</strong>
		 					</div>
		 				</span>
		 				@elseif ($errors->has('phone'))
		 				<span class="help-block">
		 					<div class="alert alert-danger">
		 						<strong>{{ $errors->first('phone') }}</strong>
		 					</div>
		 				</span>
		 				@elseif ($errors->has('date'))
		 				<span class="help-block">
		 					<div class="alert alert-danger">
		 						<strong>{{ $errors->first('date') }}</strong>
		 					</div>
		 				</span>
		 				@elseif ($errors->has('login'))
		 				<span class="help-block">
		 					<div class="alert alert-danger">
		 						<strong>{{ $errors->first('login') }} . Need <a href="/register">Registration</a>?</strong>
		 					</div>
		 				</span>
		 				@elseif (\Session::has('success'))
		 				<div class="alert alert-success">
		 					{!! \Session::get('success') !!}
		 				</div>
		 				@endif
		 				{{ csrf_field() }}
		 				<fieldset>
		 					<input type="text" class="text" name="name" placeholder="Enter Your Full Name" value="Your Full Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
		 					<input type="text" name="profile_id" class="text" placeholder="Enter His/Her ID" value="His/Her ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ID';}">
		 					<input type="text" name="phone" class="text" placeholder="Enter Your Phone Number" value="Your Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
		 					<input type="date" name="date" class="date" placeholder="Enter Date For Meeting" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Date & Time';}">
		 					<textarea value="Message" name="message" placeholder="Write Message" onfocus="this.value = '';" onblur="	if (this.value == '') {this.value = 'Message'}">Message</textarea>
		 					<input name="submit" type="submit" id="submit" value="Submit">
		 				</fieldset>
		 			</form>
		 		</div>
			</div>
			<br>
	 	</div>
	</div>



@endsection