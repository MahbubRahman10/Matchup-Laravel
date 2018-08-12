@extends('layouts.master')

@section('content')

<div class="grid_3">
	 	<div class="container">
	 		<div class="breadcrumb1">
	 			<ul>
	 				<a href="index.php"><i class="fa fa-home home_1"></i></a>
	 				<span class="divider"> | </span>
	 				<li class="current-page">Video Meeting</li>
	 			</ul>
	 		</div>

	 		<h1><center>Video Meeting</center></h1>
	 		<div>
	 			<p>Need a face to face meeting but living in abroad? We provide Skype Video Conferencing, so you can have a video chat on big screen.</p>
	 			<address class="addr">
	 				<dl class="grid_4">
	 					<dt>Resrvation Number: +8801714-252870</dt>
	 				</dl>
	 			</address>
	 		</div>
	 		
	 		<div class="contact_middle">
			 	<div class="container">
			 		<h1><center>Booking Online</center></h1>
			 		<form id="contact-form" class="contact-form">
			 			<fieldset>
			 				<input type="text" class="text" placeholder="Enter Your Full Name" value="Your Full Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
			 				<input type="text" class="text" placeholder="Enter His/Her ID" value="His/Her ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'ID';}">
			 				<input type="text" class="text" placeholder="Enter Your Phone Number(Abroad)" value="Your Phone(Abroad)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
			 				<input type="text" class="text" placeholder="Enter Your Phone Number(Bangladesh)" value="Your Phone(Bangladesh)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
			 				<input type="text" class="text" placeholder="Enter Date For Meeting" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Date & Time';}">
			 				<textarea value="Message" placeholder="Write Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message'}">Message</textarea>
			 				<input name="submit" type="submit" id="submit" value="Submit">
			 			</fieldset>
			 		</form>
			 	</div>
		 	</div>
	 	</div>
	</div>



@endsection