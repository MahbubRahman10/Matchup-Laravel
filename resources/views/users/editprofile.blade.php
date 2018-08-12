@extends('layouts.master')
@section('title')
    @section('titlename'){{ Auth::user()->name }}
@endsection
@section('content')

	{{-- Profile Style Link  --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
	
	<br>

	<div class="container usercontainer" id="dashboard">
		<div class="col-md-12">	
			<div class="col-md-3" id="usersidebar">
				<div class="user-menu">
					<a href="" class="user-icon">
						<i class="fa fa-bars fa-2x" id="qicon"></i>
					</a>
				</div>
				<div class="user">
					<div class="user-image">
						@if (Auth::user()->image == True)
						    <img src="/{{ Auth::user()->image }}" alt="users">
						@else								
							<img src="{{ asset('img/male.png') }}" alt="users">
						@endif
					</div>
					<div class="user-details">
						<h1>{{ Auth::user()->name }}</h1>
					</div>
				</div>
				<hr>
				<div class="sidebar-menu">
					<ul>
						<li><a href="/profile/inbox"><i class="fas fa-user"></i> Profile </a></li>
						<li><a href="/profile/chat" class="sidebar-menu"><i class="fab fa-facebook-messenger"></i> Chat @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">{{ $chatstatus }}</span>  @endif </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif</a></li>
						<li><a href="/profile/edit" class="sidebar-menu active"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu"><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-9" id="usercontent">		


				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="usersetting">
					@if (\Session::has('success'))
					<div class="alert alert-success">
						<ul>
							<li style="list-style: none;">{!! \Session::get('success') !!}</li>
						</ul>
					</div>
					@endif
					@if ($errors->has('educationerrors'))
					<span class="help-block">
						<div class="alert alert-danger">
							<strong>{{ $errors->first('educationerrors') }}</strong>
						</div>
					</span>
					@endif
					<form method="post" action="/profile/edit" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="">
							<!-- Basic Info Start -->
							<h3 style="background: #eee; padding: 10px 10px; color: #4c4c4c; font-weight: bold; margin-bottom: 40px;">  Basic Info </h3>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('account_type') ? ' has-error' : '' }}">
										<label>Account Type</label> <br>
										<select class="form-control" name="account_type">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->account_type == 'Public') selected="" @endif>Public</option>
										  <option @if($user->account_type == 'Private') selected="" @endif>Private</option>
										</select>
									</div>
									<span style="font-size: 11px; color: #747474">Note: If you select Private, then Guest User can not profile</span>
									
									<span class="help-block">
										<strong>{{ $errors->first('account_type') }}</strong>
									</span>
									
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('profile_create') ? ' has-error' : '' }}">
										<label>Profile Created By</label> <br>
										<!-- <input  type="text" placeholder="Self / Parent / Sibling / Friend / Other" value="{{ $user->profile_create }}" name="profile_create" required="" class="form-control"> -->
										<select class="form-control" name="profile_create">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->profile_create == 'Self') selected="" @endif>Self</option>
										  <option @if($user->userinfo->profile_create == 'Parent') selected="" @endif>Parent</option>
										  <option @if($user->userinfo->profile_create == 'Sibling') selected="" @endif>Sibling</option>
										  <option @if($user->userinfo->profile_create == 'Friend') selected="" @endif>Friend</option>
										  <option @if($user->userinfo->profile_create == 'Other') selected="" @endif>Other</option>
										</select>
									</div>
									@if ($errors->has('profile_create'))
									<span class="help-block">
										<strong>{{ $errors->first('profile_create') }}</strong>
									</span>
									@endif
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('name') ? ' has-error' : '' }}">
										<label>Name</label> <br>
										<input  type="text" value="{{ $user->name }}" name="name" required="" class="form-control">
									</div>
									@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<br><br><br><br><br><br>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('email') ? ' has-error' : '' }}">
										<label>Email</label> <br>
										<input  type="text" value="{{ $user->email }}" name="email" required="" class="form-control" disabled>
									</div>
									@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('phone') ? ' has-error' : '' }}">
										<label>Phone</label><br>
										<input  type="text" value="{{ $user->phone }}" name="phone" required="" class="form-control">
									</div>
									@if ($errors->has('phone'))
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
										<label>Date of Birth</label><br>
										<input  type="date" value="{{ $user->userinfo->date_of_birth }}" name="date_of_birth" required="" class="form-control">
									</div>
									@if ($errors->has('date_of_birth'))
									<span class="help-block">
										<strong>{{ $errors->first('date_of_birth') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="col-sm-6" style="margin-top: 10px;">
								<div class="form-group">
									
									<div class="key{{ $errors->has('image') ? ' has-error' : '' }}">
										<label>Image</label><br>
										<img src="/{{$user->image}}" height="100" width="100" style="border-radius: 0px;" id="uimg">
										<input type="file" id="fileupload" name="image" id="afiles" onchange="document.getElementById('uimg').src = window.URL.createObjectURL(this.files[0])" style="display: none;">
									</div>
									<br>
									
									<a href="" class="btn btn-success" id="imageupload" style="float: left; margin-right: 3px;"  onclick="document.getElementById('fileupload').click()">Upload Image</a>


								</div>
							</div>
						<div class="clearfix"></div>
						
						<div>
							<h3 style="background: #eee; padding: 10px 10px; color: #4c4c4c; font-weight: bold; margin-bottom: 40px;">  Personal Info </h3>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('age') ? ' has-error' : '' }}">
										<label>Age</label><br>
										<input  type="text" value="{{ $user->userinfo->age }}" name="age" required="" class="form-control">
									</div>
									@if ($errors->has('age'))
									<span class="help-block">
										<strong>{{ $errors->first('age') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('merital_status') ? ' has-error' : '' }}">
										<label>Marital Status</label><br>
										<!-- <input  type="text" placeholder="Unmarried / Divorced / Widowed" value="{{ $user->merital_status }}" name="status" required="" class="form-control"> -->
										<select class="form-control" name="status">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->merital_status == 'Unmarried') selected="" @endif>Unmarried</option>
										  <option @if($user->userinfo->merital_status == 'Divorced') selected="" @endif>Divorced</option>
										  <option @if($user->userinfo->merital_status == 'Widowed') selected="" @endif>Widowed</option>
										  <option @if($user->userinfo->merital_status == 'Separated') selected="" @endif>Separated</option>
										</select>
									</div>
									@if ($errors->has('merital_status'))
									<span class="help-block">
										<strong>{{ $errors->first('merital_status') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('height') ? ' has-error' : '' }}">
										<label>Height</label><br>
										<!-- <input  type="text" placeholder="ex: 4 ft 11 inch / 5 ft / 5 ft 1 inch" value="{{ $user->height }}" name="height" required="" class="form-control"> -->
										<select class="form-control" name="height">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->height == '4ft 5in - 134cm') selected="" @endif>4ft 5in - 134cm</option>
										  <option @if($user->userinfo->height == '4ft 6in - 137cm') selected="" @endif>4ft 6in - 137cm</option>
										  <option @if($user->userinfo->height == '4ft 7in - 140cm') selected="" @endif>4ft 7in - 140cm</option>
										  <option @if($user->userinfo->height == '4ft 8in - 142cm') selected="" @endif>4ft 8in - 142cm</option>
										  <option @if($user->userinfo->height == '4ft 9in - 144cm') selected="" @endif>4ft 9in - 144cm</option>
										  <option @if($user->userinfo->height == '4ft 10in - 147cm') selected="" @endif>4ft 10in - 147cm</option>
										  <option @if($user->userinfo->height == '4ft 11in - 149cm') selected="" @endif>4ft 11in - 149cm</option>
										  <option @if($user->userinfo->height == '5ft - 152cm') selected="" @endif>5ft - 152cm</option>
										  <option @if($user->userinfo->height == '5ft 1in - 154cm') selected="" @endif>5ft 1in - 154cm</option>
										  <option @if($user->userinfo->height == '5ft 2in - 157cm') selected="" @endif>5ft 2in - 157cm</option>
										  <option @if($user->userinfo->height == '5ft 3in - 160cm') selected="" @endif>5ft 3in - 160cm</option>
										  <option @if($user->userinfo->height == '5ft 4in - 162cm') selected="" @endif>5ft 4in - 162cm</option>
										  <option @if($user->userinfo->height == '5ft 5in - 165cm') selected="" @endif>5ft 5in - 165cm</option>
										  <option @if($user->userinfo->height == '5ft 6in - 167cm') selected="" @endif>5ft 6in - 167cm</option>
										  <option @if($user->userinfo->height == '5ft 7in - 170cm') selected="" @endif>5ft 7in - 170cm</option>
										  <option @if($user->userinfo->height == '5ft 8in - 172cm') selected="" @endif>5ft 8in - 172cm</option>
										  <option @if($user->userinfo->height == '5ft 9in - 175cm') selected="" @endif>5ft 9in - 175cm</option>
										  <option @if($user->userinfo->height == '5ft 10in - 177cm') selected="" @endif>5ft 10in - 177cm</option>
										  <option @if($user->userinfo->height == '5ft 11in - 180cm') selected="" @endif>5ft 11in - 180cm</option>
										  <option @if($user->userinfo->height == '6ft - 182cm') selected="" @endif>6ft - 182cm</option>
										  <option @if($user->userinfo->height == '6ft 1in - 185cm') selected="" @endif>6ft 1in - 185cm</option>
										  <option @if($user->userinfo->height == '6ft 2in - 187cm') selected="" @endif>6ft 2in - 187cm</option>
										  <option @if($user->userinfo->height == '6ft 3in - 190cm') selected="" @endif>6ft 3in - 190cm</option>
										  <option @if($user->userinfo->height == '6ft 4in - 193cm') selected="" @endif>6ft 4in - 193cm</option>
										  <option @if($user->userinfo->height == '6ft 5in - 195cm') selected="" @endif>6ft 5in - 195cm</option>
										  <option @if($user->userinfo->height == '6ft 6in - 198cm') selected="" @endif>6ft 6in - 198cm</option>
										  <option @if($user->userinfo->height == '6ft 7in - 200cm') selected="" @endif>6ft 7in - 200cm</option>
										  <option @if($user->userinfo->height == '6ft 8in - 203cm') selected="" @endif>6ft 8in - 203cm</option>
										  <option @if($user->userinfo->height == '6ft 9in - 205cm') selected="" @endif>6ft 9in - 205cm</option>
										  <option @if($user->userinfo->height == '6ft 10in - 208cm') selected="" @endif>6ft 10in - 208cm</option>
										  <option @if($user->userinfo->height == '6ft 11in - 210cm') selected="" @endif>6ft 11in - 210cm</option>
										  <option @if($user->userinfo->height == '7ft - 213cm') selected="" @endif>7ft - 213cm</option>
										</select>
									</div>
									@if ($errors->has('height'))
									<span class="help-block">
										<strong>{{ $errors->first('height') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('weight') ? ' has-error' : '' }}">
										<label>Weight</label><br>
										<input  type="text" placeholder="ex: 50KG / 60KG / 70KG / 80KG" value="{{ $user->userinfo->weight }}" name="weight" required="" class="form-control">
									</div>
									@if ($errors->has('weight'))
									<span class="help-block">
										<strong>{{ $errors->first('weight') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('blood_group') ? ' has-error' : '' }}">
										<label>Blood Group</label><br>
										<!-- <input  type="name" placeholder="A+ / A- / B+ / B- / AB+ / AB-" value="{{ $user->blood_group }}" name="blood_group" required="" class="form-control"> -->
										<select class="form-control" name="blood_group">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->blood_group == 'Dont Know') selected="" @endif>Don't Know</option>
										  <option @if($user->userinfo->blood_group == 'A+') selected="" @endif>A+</option>
										  <option @if($user->userinfo->blood_group == 'A-') selected="" @endif>A-</option>
										  <option @if($user->userinfo->blood_group == 'B+') selected="" @endif>B+</option>
										  <option @if($user->userinfo->blood_group == 'B-') selected="" @endif>B-</option>
										  <option @if($user->userinfo->blood_group == 'AB+') selected="" @endif>AB+</option>
										  <option @if($user->userinfo->blood_group == 'AB-') selected="" @endif>AB-</option>
										  <option @if($user->userinfo->blood_group == 'O+') selected="" @endif>O+</option>
										  <option @if($user->userinfo->blood_group == 'O-') selected="" @endif>O-</option>
										</select>
									</div>
									@if ($errors->has('blood_group'))
									<span class="help-block">
										<strong>{{ $errors->first('blood_group') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('body_type') ? ' has-error' : '' }}">
										<label>Body Type</label><br>
										<!-- <input  type="name" placeholder="Slim / Average / Fat / Any" value="{{ $user->body_type }}" name="body_type" required="" class="form-control"> -->
										<select class="form-control" name="body_type">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->body_type == 'Slim') selected="" @endif>Slim</option>
										  <option @if($user->userinfo->body_type == 'Average') selected="" @endif>Average</option>
										  <option @if($user->userinfo->body_type == 'Fat') selected="" @endif>Fat</option>
										  <option @if($user->userinfo->body_type == 'Any') selected="" @endif>Any</option>
										</select>
									</div>
									@if ($errors->has('body_type'))
									<span class="help-block">
										<strong>{{ $errors->first('body_type') }}</strong>
									</span>
									@endif
								</div>
							</div>

							{{-- <div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('body_type') ? ' has-error' : '' }}">
										<label>Health Information</label><br>
										<!-- <input  type="name" placeholder="Slim / Average / Fat / Any" value="{{ $user->body_type }}" name="body_type" required="" class="form-control"> -->
										<select class="form-control" name="">
										  <option value="-1">-- Select --</option>
										  <option value="{{ $user->body_type }}">No Health Problems</option>
										  <option value="{{ $user->body_type }}">HIV Positive</option>
										  <option value="{{ $user->body_type }}">Diabetes</option>
										  <option value="{{ $user->body_type }}">Low BP</option>
										  <option value="{{ $user->body_type }}">High BP</option>
										  <option value="{{ $user->body_type }}">Heart Ailments</option>
										  <option value="{{ $user->body_type }}">Other</option>
										</select>
									</div>
									@if ($errors->has('body_type'))
									<span class="help-block">
										<strong>{{ $errors->first('body_type') }}</strong>
									</span>
									@endif
								</div>
							</div> --}}

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('drink') ? ' has-error' : '' }}">
										<label>Drink</label><br>
										<!-- <input  type="name" placeholder="Yes / No" value="{{ $user->drink }}" name="drink" required="" class="form-control"> -->
										<select class="form-control" name="drink">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->drink == 'No') selected="" @endif>No</option>
										  	<option @if($user->userinfo->drink == 'Yes') selected="" @endif>Yes</option>
										  	
										</select>
									</div>
									@if ($errors->has('drink'))
									<span class="help-block">
										<strong>{{ $errors->first('drink') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('smoke') ? ' has-error' : '' }}">
										<label>Smoke</label><br>
										<!-- <input  type="name" placeholder="Yes / No" value="{{ $user->smoke }}" name="smoke" required="" class="form-control"> -->
										<select class="form-control" name="smoke">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->smoke == 'No') selected="" @endif>No</option>
											<option @if($user->userinfo->smoke == 'Yes') selected="" @endif>Yes</option>

										</select>
									</div>
									@if ($errors->has('smoke'))
									<span class="help-block">
										<strong>{{ $errors->first('smoke') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('occupation') ? ' has-error' : '' }}">
										<label>Profession</label><br>
										<!-- <input  type="name" placeholder="Dr./Engineer/Teacher/Business/Other" value="{{ $user->occupation }}" name="occupation" required="" class="form-control"> -->
										<select class="form-control" name="occupation">
											  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											  <option @if($user->userinfo->occupation == 'Accountant') selected="" @endif>Accountant</option>
											  <option @if($user->userinfo->occupation == 'Advocate') selected="" @endif>Advocate</option>
											  <option @if($user->userinfo->occupation == 'Architect') selected="" @endif>Architect</option>
											  <option @if($user->userinfo->occupation == 'Bachelor') selected="" @endif>Banker</option>
											  <option @if($user->userinfo->occupation == 'BCS Cadre') selected="" @endif>BCS Cadre</option>
											  <option @if($user->userinfo->occupation == 'Beautician') selected="" @endif>Beautician</option>
											  <option @if($user->userinfo->occupation == 'Business') selected="" @endif>Business</option>
											  <option @if($user->userinfo->occupation == 'Chartered Accountant') selected="" @endif>Chartered Accountant</option>
											  <option @if($user->userinfo->occupation == 'Contractor') selected="" @endif>Contractor</option>
											  <option @if($user->userinfo->occupation == 'Customer Support Professional') selected="" @endif>Customer Support Professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Defense Employee') selected="" @endif>Defense Employee</option>
											  
											  <option @if($user->userinfo->occupation == 'Dentist') selected="" @endif>Dentist</option>
											  
											  <option @if($user->userinfo->occupation == 'Designer') selected="" @endif>Designer</option>
											  
											  <option @if($user->userinfo->occupation == 'Doctor') selected="" @endif>Doctor</option>
											  
											  <option @if($user->userinfo->occupation == 'Engineer') selected="" @endif>Engineer</option>
											  
											  <option @if($user->userinfo->occupation == 'Executive') selected="" @endif>Executive</option>
											  
											  <option @if($user->userinfo->occupation == 'Factory worker') selected="" @endif>Factory worker</option>
											  
											  <option @if($user->userinfo->occupation == 'Garments Employee') selected="" @endif>Garments Employee</option>
											  
											  <option @if($user->userinfo->occupation == 'Government Employee') selected="" @endif>Government Employee</option>
											  
											  <option @if($user->userinfo->occupation == 'Health Care Professional') selected="" @endif>Health Care Professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Journalist') selected="" @endif>Journalist</option>
											  
											  <option @if($user->userinfo->occupation == 'Manager') selected="" @endif>Manager</option>
											  
											  <option @if($user->userinfo->occupation == 'Marketing Professional') selected="" @endif>Marketing Professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Media Professional') selected="" @endif>Media Professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Chartered Accountant') selected="" @endif>Chartered Accountant</option>
											  
											  <option @if($user->userinfo->occupation == 'Merchandiser') selected="" @endif>Merchandiser</option>
											  
											  <option @if($user->userinfo->occupation == 'NGO Emplyee') selected="" @endif>NGO Emplyee</option>
											  
											  <option @if($user->userinfo->occupation == 'No Job') selected="" @endif>No Job</option>
											  
											  <option @if($user->userinfo->occupation == 'Nurse') selected="" @endif>Nurse</option>
											  
											  <option @if($user->userinfo->occupation == 'Pharmacist') selected="" @endif>Pharmacist</option>
											  
											  <option @if($user->userinfo->occupation == 'Private Service') selected="" @endif>Private Service</option>
											  
											  <option @if($user->userinfo->occupation == 'Production professional') selected="" @endif>Production professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Professor') selected="" @endif>Professor</option>
											  <
											  <option @if($user->userinfo->occupation == 'Psychologist') selected="" @endif>Psychologist</option>
											  
											  <option @if($user->userinfo->occupation == 'Real Estate Professional') selected="" @endif>Real Estate Professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Retired Person') selected="" @endif>Retired Person</option>
											  
											  <option @if($user->userinfo->occupation == 'Sales Professional') selected="" @endif>Sales Professional</option>
											  
											  <option @if($user->userinfo->occupation == 'Scientist') selected="" @endif>Scientist</option>
											  
											  <option @if($user->userinfo->occupation == 'Self-employed Person') selected="" @endif>Self-employed Person</option>
											  
											  <option @if($user->userinfo->occupation == 'Social Worker') selected="" @endif>Social Worker</option>
											  
											  <option @if($user->userinfo->occupation == 'Sportsman') selected="" @endif>Sportsman</option>
											  
											  <option @if($user->userinfo->occupation == 'Student') selected="" @endif>Student</option>
											  
											  <option @if($user->userinfo->occupation == 'Government Employee') selected="" @endif>Government Employee</option>
											  
											  <option @if($user->userinfo->occupation == 'Teacher') selected="" @endif>Teacher</option>
											  
											  <option @if($user->userinfo->occupation == 'Technician') selected="" @endif>Technician</option>
											  
											  <option @if($user->userinfo->occupation == 'Volunteer') selected="" @endif>Volunteer</option>
											  
											  <option @if($user->userinfo->occupation == 'Writer') selected="" @endif>Writer</option>
										</select>

									</div>
									@if ($errors->has('occupation'))
									<span class="help-block">
										<strong>{{ $errors->first('occupation') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('annual_income') ? ' has-error' : '' }}">
										<label>Annual Income</label><br>
										<input  type="number" placeholder="ex: 100000 / 150000 / 500000" min="0" value="{{ $user->userinfo->annual_income }}" name="annual_income" required="" class="form-control">
									</div>
									@if ($errors->has('annual_income'))
									<span class="help-block">
										<strong>{{ $errors->first('annual_income') }}</strong>
									</span>
									@endif
								</div>
								<br>
							</div>
						</div>
						
						<div class="clearfix"></div>

						<!-- Basic Info End -->

						<div>
							<h3 style="background: #eee; padding: 10px 10px; color: #4c4c4c; font-weight: bold; margin-bottom: 40px;">  Education Info </h3>
							<!-- Education & Profession Start -->
							
							<div class="addmoreeducation">
								@if (count($user->educations) > 0)

								@foreach ($user->educations as $education)
								<div class="col-sm-4">
									<div class="form-group">
										<div class="key{{ $errors->has('education') ? ' has-error' : '' }}">
											<label>Educational Qualification</label><br>
											<select class="form-control" name="degree_name[]">
												<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
												<option @if($education->degree_name == 'Phd/Doctorate') selected="" @endif>Phd/Doctorate</option>
												<option @if($education->degree_name == 'Masters') selected="" @endif>Masters</option>
												<option @if($education->degree_name == 'MBA') selected="" @endif>MBA</option>
												<option @if($education->degree_name == 'Bachelor') selected="" @endif>Bachelor</option>
												<option @if($education->degree_name == 'BBA') selected="" @endif>BBA</option>
												<option @if($education->degree_name == 'Diploma') selected="" @endif>Diploma</option>
												<option @if($education->degree_name == 'HSC') selected="" @endif>HSC</option>
												<option @if($education->degree_name == 'SSC') selected="" @endif>SSC</option>
												<option @if($education->degree_name == 'Dakhil') selected="" @endif>Dakhil</option>
												<option @if($education->degree_name == 'Alim') selected="" @endif>Alim</option>
												<option @if($education->degree_name == 'Fajil') selected="" @endif>Fajil</option>
												<option @if($education->degree_name == 'Kamil') selected="" @endif>Kamil</option>
											</select>
										</div>
										@if ($errors->has('education'))
										<span class="help-block">
											<strong>{{ $errors->first('education') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="key{{ $errors->has('institute') ? ' has-error' : '' }}">
											<label>Institute</label><br>
											<input type="text" name="institute[]" class="form-control" value="{{ $education->institution }}">
										</div>
										@if ($errors->has('institute'))
										<span class="help-block">
											<strong>{{ $errors->first('institute') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="key{{ $errors->has('passing_year') ? ' has-error' : '' }}">
											<label>Passing Year</label><br>
											<input type="text" name="passing_year[]" class="form-control" value="{{ $education->passing_year }}">
										</div>
										@if ($errors->has('passing_year'))
										<span class="help-block">
											<strong>{{ $errors->first('passing_year') }}</strong>
										</span>
										@endif
									</div>
								</div>
								@endforeach

								@else
								<div class="col-sm-4">
									<div class="form-group">
										<div class="key{{ $errors->has('education') ? ' has-error' : '' }}">
											<label>Educational Qualification</label><br>
											<select class="form-control" name="degree_name[]">
												<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
												<option @if($user->educations == 'Phd/Doctorate') selected="" @endif>Phd/Doctorate</option>
												<option @if($user->educations == 'Masters') selected="" @endif>Masters</option>
												<option @if($user->educations == 'MBA') selected="" @endif>MBA</option>
												<option @if($user->educations == 'Bachelor') selected="" @endif>Bachelor</option>
												<option @if($user->educations == 'BBA') selected="" @endif>BBA</option>
												<option @if($user->educations == 'Diploma') selected="" @endif>Diploma</option>
												<option @if($user->educations == 'HSC') selected="" @endif>HSC</option>
												<option @if($user->educations == 'SSC') selected="" @endif>SSC</option>
												<option @if($user->educations == 'Dakhil') selected="" @endif>Dakhil</option>
												<option @if($user->educations == 'Alim') selected="" @endif>Alim</option>
												<option @if($user->educations == 'Fajil') selected="" @endif>Fajil</option>
												<option @if($user->educations == 'Kamil') selected="" @endif>Kamil</option>
											</select>
										</div>
										@if ($errors->has('education'))
										<span class="help-block">
											<strong>{{ $errors->first('education') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="key{{ $errors->has('institute') ? ' has-error' : '' }}">
											<label>Institute</label><br>
											<input type="text" name="institute[]" class="form-control">
										</div>
										@if ($errors->has('institute'))
										<span class="help-block">
											<strong>{{ $errors->first('institute') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="key{{ $errors->has('passing_year') ? ' has-error' : '' }}">
											<label>Passing Year</label><br>
											<input type="text" name="passing_year[]" class="form-control">
										</div>
										@if ($errors->has('passing_year'))
										<span class="help-block">
											<strong>{{ $errors->first('passing_year') }}</strong>
										</span>
										@endif
									</div>
								</div>
								@endif
							</div>

							


						</div>
						<a href="" id="addmoreeducation" class="btn btn-success">Add More Education</a>
						<div class="clearfix"></div>
						<!-- Education & Profession Start -->

						<div>
							<h3 style="background: #eee; padding: 10px 10px; color: #4c4c4c; font-weight: bold; margin-bottom: 40px;">  Family Info </h3>

							<!-- Family Info Start -->
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('fathers_occupation') ? ' has-error' : '' }}">
										<label >Father's Profession</label><br>
										<!-- <input  type="name" placeholder="Enter Your Father's Profession" value="{{ $user->fathers_occupation }}" name="fathers_occupation" required="" class="form-control"> -->
										<select class="form-control" name="fathers_occupation">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->fathers_occupation == 'Retired Person') selected="" @endif>Retired Person</option>
											<option @if($user->userinfo->fathers_occupation == 'Accountant') selected="" @endif>Accountant</option>
											<option @if($user->userinfo->fathers_occupation == 'Advocate') selected="" @endif>Advocate</option>
											<option @if($user->userinfo->fathers_occupation == 'Architect') selected="" @endif>Architect</option>
											<option @if($user->userinfo->fathers_occupation == 'Banker') selected="" @endif>Banker</option>
											
											<option @if($user->userinfo->fathers_occupation == 'BCS Cadre') selected="" @endif>BCS Cadre</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Business') selected="" @endif>Business</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Chartered Accountant') selected="" @endif>Chartered Accountant</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Contractor') selected="" @endif>Contractor</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Customer Support Professional') selected="" @endif>Customer Support Professional</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Defense Employee') selected="" @endif>Defense Employee</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Dentist') selected="" @endif>Dentist</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Designer') selected="" @endif>Designer</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Doctor') selected="" @endif>Doctor</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Engineer') selected="" @endif>Engineer</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Executive') selected="" @endif>Executive</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Factory Worker') selected="" @endif>Factory Worker</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Garments Employee') selected="" @endif>Garments Employee</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Government Employee') selected="" @endif>Government Employee</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Health Care Professional') selected="" @endif>Health Care Professional</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Journalist') selected="" @endif>Journalist</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Manager') selected="" @endif>Manager</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Marketing Professional') selected="" @endif>Marketing Professional</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Media Professional') selected="" @endif>Media Professional</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Chartered Accountant') selected="" @endif>Chartered Accountant</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Merchandiser') selected="" @endif>Merchandiser</option>
											
											<option @if($user->userinfo->fathers_occupation == 'NGO Emplyee') selected="" @endif>NGO Emplyee</option>
											
											<option @if($user->userinfo->fathers_occupation == 'No Job') selected="" @endif>No Job</option>
		 									
		 									<option @if($user->userinfo->fathers_occupation == 'Pharmacist') selected="" @endif>Pharmacist</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Private Service') selected="" @endif>Private Service</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Production Professional') selected="" @endif>Production Professional</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Professor') selected="" @endif>Professor</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Psychologist') selected="" @endif>Psychologist</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Real Estate Professional') selected="" @endif>Real Estate Professional</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Scientist') selected="" @endif>Scientist</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Social Worker') selected="" @endif>Social Worker</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Government Employee') selected="" @endif>Government Employee</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Teacher') selected="" @endif>Teacher</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Writer') selected="" @endif>Writer</option>
											
											<option @if($user->userinfo->fathers_occupation == 'Other') selected="" @endif>Other</option>
										</select>
									</div>
									@if ($errors->has('fathers_occupation'))
									<span class="help-block">
										<strong>{{ $errors->first('fathers_occupation') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('mothers_occupation') ? ' has-error' : '' }}">
										<label >Mother's Profession</label><br>
										<!-- <input  type="name" placeholder="ex: Housewife / Teacher / Other" value="{{ $user->mothers_occupation }}" name="mothers_occupation" required="" class="form-control"> -->
										<select class="form-control" name="mothers_occupation">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->mothers_occupation == 'Housewife') selected="" @endif>Housewife</option>
											<option @if($user->userinfo->mothers_occupation == 'Accountant') selected="" @endif>Accountant</option>
											<option @if($user->userinfo->mothers_occupation == 'Advocate') selected="" @endif>Advocate</option>
											<option @if($user->userinfo->mothers_occupation == 'Architect') selected="" @endif>Architect</option>
											<option @if($user->userinfo->mothers_occupation == 'Banker') selected="" @endif>Banker</option>
											
											<option @if($user->userinfo->mothers_occupation == 'BCS Cadre') selected="" @endif>BCS Cadre</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Beautician') selected="" @endif>Beautician</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Chartered Accountant') selected="" @endif>Chartered Accountant</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Dentist') selected="" @endif>Dentist</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Designer') selected="" @endif>Designer</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Doctor') selected="" @endif>Doctor</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Engineer') selected="" @endif>Engineer</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Government Employee') selected="" @endif>Government Employee</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Journalist') selected="" @endif>Journalist</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Manager') selected="" @endif>Manager</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Chartered Accountant') selected="" @endif>Chartered Accountant</option>
											
											<option @if($user->userinfo->mothers_occupation == 'NGO Emplyee') selected="" @endif>NGO Emplyee</option>
											
											<option @if($user->userinfo->mothers_occupation == 'No Job') selected="" @endif>No Job</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Nurse') selected="" @endif>Nurse</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Professor') selected="" @endif>Professor</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Psychologist') selected="" @endif>Psychologist</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Retired Person') selected="" @endif>Retired Person</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Social Worker') selected="" @endif>Social Worker</option>
											
											
											<option @if($user->userinfo->mothers_occupation == 'Teacher') selected="" @endif>Teacher</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Writer') selected="" @endif>Writer</option>
											
											<option @if($user->userinfo->mothers_occupation == 'Other') selected="" @endif>Other</option>
										</select>
									</div>
									@if ($errors->has('mothers_occupation'))
									<span class="help-block">
										<strong>{{ $errors->first('mothers_occupation') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('brothers') ? ' has-error' : '' }}">
										<label >Brothers</label><br>
										<!-- <input  type="name" placeholder="How Much Brothers ?" value="{{ $user->brothers }}" name="brothers" required="" class="form-control"> -->
										<select class="form-control" name="brothers">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->brothers == '0') selected="" @endif>0</option>
										  <option @if($user->userinfo->brothers == '1') selected="" @endif>1</option>
										  <option @if($user->userinfo->brothers == '2') selected="" @endif>2</option>
										  <option @if($user->userinfo->brothers == '3') selected="" @endif>3</option>
										  <option @if($user->userinfo->brothers == '4') selected="" @endif>4</option>
										  <option @if($user->userinfo->brothers == '5') selected="" @endif>5</option>
										  <option @if($user->userinfo->brothers == '6') selected="" @endif>6</option>
										  <option @if($user->userinfo->brothers == '7') selected="" @endif>7</option>
										  <option @if($user->userinfo->brothers == '8') selected="" @endif>8</option>
										  <option @if($user->userinfo->brothers == '9') selected="" @endif>9</option>
										  <option @if($user->userinfo->brothers == '10') selected="" @endif>10</option>
										</select>
									</div>
									@if ($errors->has('brothers'))
									<span class="help-block">
										<strong>{{ $errors->first('brothers') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('sisters') ? ' has-error' : '' }}">
										<label >Sisters</label><br>
										<!-- <input  type="name" placeholder="How Much Sisters ?" value="{{ $user->sisters }}" name="sisters" required="" class="form-control"> -->
										<select class="form-control" name="sisters">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->sisters == '0') selected="" @endif>0</option>
										  <option @if($user->userinfo->sisters == '1') selected="" @endif>1</option>
										  <option @if($user->userinfo->sisters == '2') selected="" @endif>2</option>
										  <option @if($user->userinfo->sisters == '3') selected="" @endif>3</option>
										  <option @if($user->userinfo->sisters == '4') selected="" @endif>4</option>
										  <option @if($user->userinfo->sisters == '5') selected="" @endif>5</option>
										  <option @if($user->userinfo->sisters == '6') selected="" @endif>6</option>
										  <option @if($user->userinfo->sisters == '7') selected="" @endif>7</option>
										  <option @if($user->userinfo->sisters == '8') selected="" @endif>8</option>
										  <option @if($user->userinfo->sisters == '9') selected="" @endif>9</option>
										  <option @if($user->userinfo->sisters == '10') selected="" @endif>10</option>
										</select>
									</div>
									@if ($errors->has('sisters'))
									<span class="help-block">
										<strong>{{ $errors->first('sisters') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('children') ? ' has-error' : '' }}">
										<label>Have Children</label><br>
										<!-- <input  type="name" placeholder="Yes / No" value="{{ $user->children }}" name="children" required="" class="form-control"> -->
										<select class="form-control" name="children">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->children == 'No') selected="" @endif>No</option>
										  	<option @if($user->userinfo->children == 'Yes, Living together') selected="" @endif>Yes, Living together</option>
										  	<option @if($user->children == 'Yes, No living together') selected="" @endif>Yes, Not living together</option>
										</select>
									</div>
									@if ($errors->has('children'))
									<span class="help-block">
										<strong>{{ $errors->first('children') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('mother_tongue') ? ' has-error' : '' }}">
										<label >Mother Tongue</label><br>
										<!-- <input  type="name" placeholder="Bangla / English / Other" value="{{ $user->mother_tongue }}" name="mother_tongue" required="" class="form-control"> -->
										<select class="form-control" name="mother_tongue">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->mother_tongue == 'Bangla') selected="" @endif>Bangla</option>
										  	<option @if($user->userinfo->mother_tongue == 'English') selected="" @endif>English</option>
										  	<option @if($user->userinfo->mother_tongue == 'Other') selected="" @endif>Other</option>
										</select>
									</div>
									@if ($errors->has('mother_tongue'))
									<span class="help-block">
										<strong>{{ $errors->first('mother_tongue') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('family_values') ? ' has-error' : '' }}">
										<label >Family Values</label><br>
										<!-- <input  type="name" placeholder="Religious / Traditional / Moderate" value="{{ $user->family_values }}" name="family_values" required="" class="form-control"> -->
										<select class="form-control" name="family_values">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->family_values == 'Religious') selected="" @endif>Religious</option>
										  	<option @if($user->userinfo->family_values == 'Traditional') selected="" @endif>Traditional</option>
										  	<option @if($user->family_values == 'Moderate') selected="" @endif>Moderate</option>
										</select>
									</div>
									@if ($errors->has('family_values'))
									<span class="help-block">
										<strong>{{ $errors->first('family_values') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<!-- Family Info End -->
						<div>

							<h3 style="background: #eee; padding: 10px 10px; color: #4c4c4c; font-weight: bold; margin-bottom: 40px;">  Address Info </h3>
							<!-- Address & Details Start -->

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('country') ? ' has-error' : '' }}">
										<label>Current Living Country</label><br>
										<input  type="text" placeholder="Enter Your Current Country" value="{{ $user->userinfo->country }}" name="country" required="" class="form-control">
									</div>
									@if ($errors->has('country'))
									<span class="help-block">
										<strong>{{ $errors->first('country') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('residential_status') ? ' has-error' : '' }}">
										<label>Home Residential Status</label><br>
										<!-- <input  type="text" placeholder="Owner / Rental" value="{{ $user->residential_status }}" name="residential_status" required="" class="form-control"> -->
										<select class="form-control" name="residential_status">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>
											<option @if($user->userinfo->residential_status == 'Owner') selected="" @endif>Owner</option>
										  	<option @if($user->userinfo->residential_status == 'Rental') selected="" @endif>Rental</option>
										</select>
									</div>
									@if ($errors->has('residential_status'))
									<span class="help-block">
										<strong>{{ $errors->first('residential_status') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('division') ? ' has-error' : '' }}">
										<label>Division</label><br>
										<select class="form-control" name="division" id="divisions">
										  <option value="-1" selected="selected" disabled="disabled">-- Select --</option>
										  <option @if($user->userinfo->division == 'Barishal') selected="" @endif>Barishal</option>
										  <option @if($user->userinfo->division == 'Chattagram') selected="" @endif>Chattagram</option>
										  <option @if($user->userinfo->division == 'Dhaka') selected="" @endif>Dhaka</option>
										  <option @if($user->userinfo->division == 'Khulna') selected="" @endif>Khulna</option>
										  <option @if($user->userinfo->division == 'Mymensingh') selected="" @endif>Mymensingh</option>
										  <option @if($user->userinfo->division == 'Rajshahi') selected="" @endif>Rajshahi</option>
										  <option @if($user->userinfo->division == 'Sylhet') selected="" @endif>Sylhet</option>
										  <option @if($user->userinfo->division == 'Rangpur') selected="" @endif>Rangpur</option>
										</select>
									</div>
									@if ($errors->has('division'))
									<span class="help-block">
										<strong>{{ $errors->first('division') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('district') ? ' has-error' : '' }}">
										<label>District</label><br>
										<select class="form-control" name="district" id="districts">
											<option value="-1" selected="selected" disabled="disabled">-- Select --</option>

											@if($user->userinfo->division == 'Barishal')
											<!-- Barishal Division -->
											<option @if($user->userinfo->district == 'Barguna') selected="" @endif>Barguna</option>
											<option @if($user->userinfo->district == 'Barishal') selected="" @endif>Barisal</option>
											<option @if($user->userinfo->district == 'Bhola') selected="" @endif>Bhola</option>
											<option @if($user->userinfo->district == 'Jhalokathi') selected="" @endif>Jhalokathi</option>
											<option @if($user->userinfo->district == 'Patuakhali') selected="" @endif>Patuakhali</option>
											<option @if($user->userinfo->district == 'Pirojpur') selected="" @endif>Pirojpur</option>

											@elseif($user->userinfo->division == 'Chattagram')

											<!-- Chattagram Division -->
											<option @if($user->userinfo->district == 'Bandarban') selected="" @endif>Bandarban</option>
											<option @if($user->userinfo->district == 'Brahmanbaria') selected="" @endif>Brahmanbaria</option>
											<option @if($user->userinfo->district == 'Chandpur') selected="" @endif>Chandpur</option>
											<option @if($user->userinfo->district == 'Chattagram') selected="" @endif>Chattagram</option>
											<option @if($user->userinfo->district == 'Comilla') selected="" @endif>Comilla</option>
											<option @if($user->userinfo->district == 'Coxs Bazar') selected="" @endif>Coxs Bazar</option>
											<option @if($user->userinfo->district == 'Feni') selected="" @endif>Feni</option>
											<option @if($user->userinfo->district == 'Khagrachhari') selected="" @endif>Khagrachhari</option>
											<option @if($user->userinfo->district == 'Lakshmipur') selected="" @endif>Lakshmipur</option>
											<option @if($user->userinfo->district == 'Noakhali') selected="" @endif>Noakhali</option>
											<option @if($user->userinfo->district == 'Rangamati') selected="" @endif>Rangamati</option>

											@elseif($user->userinfo->division == 'Dhaka')

											<!-- Dhaka Division -->
											<option @if($user->userinfo->district == 'Dhaka') selected="" @endif>Dhaka</option>
											<option @if($user->userinfo->district == 'Faridpur') selected="" @endif>Faridpur</option>
											<option @if($user->userinfo->district == 'Gazipur') selected="" @endif>Gazipur</option>
											<option @if($user->userinfo->district == 'Gopalganj') selected="" @endif>Gopalganj</option>
											<option @if($user->userinfo->district == 'Kishoreganj') selected="" @endif>Kishoreganj</option>
											<option @if($user->userinfo->district == 'Madaripur') selected="" @endif>Madaripur</option>
											<option @if($user->userinfo->district == 'Manikganj') selected="" @endif>Manikganj</option>
											<option @if($user->userinfo->district == 'Munshiganj') selected="" @endif>Munshiganj</option>
											<option @if($user->userinfo->district == 'Narayanganj') selected="" @endif>Narayanganj</option>
											<option @if($user->userinfo->district == 'Narshingdi') selected="" @endif>Narshingdi</option>
											<option @if($user->userinfo->district == 'Rajbari') selected="" @endif>Rajbari</option>
											<option @if($user->userinfo->district == 'Shariatpur') selected="" @endif>Shariatpur</option>
											<option @if($user->userinfo->district == 'Tangail') selected="" @endif>Tangail</option>

											@elseif($user->userinfo->division == 'Mymensingh')

											<!-- Mymensingh Division -->
											<option @if($user->userinfo->district == 'Jamalpur') selected="" @endif>Jamalpur</option>
											<option @if($user->userinfo->district == 'Mymensingh') selected="" @endif>Mymensingh</option>
											<option @if($user->userinfo->district == 'Netrokona') selected="" @endif>Netrokona</option>
											<option @if($user->userinfo->district == 'Sherpur') selected="" @endif>Sherpur</option>

											@elseif($user->userinfo->division == 'Khulna')

											<!-- Khulna Division -->
											<option @if($user->userinfo->district == 'Bagerhat') selected="" @endif>Bagerhat</option>
											<option @if($user->userinfo->district == 'Chuadanga') selected="" @endif>Chuadanga</option>
											<option @if($user->userinfo->district == 'Jessore') selected="" @endif>Jessore</option>
											<option @if($user->userinfo->district == 'Jhenaidah') selected="" @endif>Jhenaidah</option>
											<option @if($user->userinfo->district == 'Khulna') selected="" @endif>Khulna</option>
											<option @if($user->userinfo->district == 'Kushtia') selected="" @endif>Kushtia</option>
											<option @if($user->userinfo->district == 'Magura') selected="" @endif>Magura</option>
											<option @if($user->userinfo->district == 'Meherpur') selected="" @endif>Meherpur</option>
											<option @if($user->userinfo->district == 'Narail') selected="" @endif>Narail</option>
											<option @if($user->userinfo->district == 'Sathkhira') selected="" @endif>Sathkhira</option>


											@elseif($user->userinfo->division == 'Rajshahi')


											<!-- Rajshahi Division -->
											<option @if($user->userinfo->district == 'Bogra') selected="" @endif>Bogra</option>
											<option @if($user->userinfo->district == 'Naogaon') selected="" @endif>Naogaon</option>
											<option @if($user->userinfo->district == 'Joypurhat') selected="" @endif>Joypurhat</option>
											<option @if($user->userinfo->district == 'Natore') selected="" @endif>Natore</option>
											<option @if($user->userinfo->district == 'Nawabganj') selected="" @endif>Nawabganj</option>
											<option @if($user->userinfo->district == 'Pabna') selected="" @endif>Pabna</option>
											<option @if($user->userinfo->district == 'Rajshahi') selected="" @endif>Rajshahi</option>
											<option @if($user->userinfo->district == 'Sirajganj') selected="" @endif>Sirajganj</option>

											@elseif($user->userinfo->division == 'Rangpur')

											<!-- Rangpur Division -->
											<option @if($user->userinfo->district == 'Dinajpur') selected="" @endif>Dinajpur</option>
											<option @if($user->userinfo->district == 'Gaibandha') selected="" @endif>Gaibandha</option>
											<option @if($user->userinfo->district == 'Kurigram') selected="" @endif>Kurigram</option>
											<option @if($user->userinfo->district == 'Lalmonirhat') selected="" @endif>Lalmonirhat</option>
											<option @if($user->userinfo->district == 'Nilphamari') selected="" @endif>Nilphamari</option>
											<option @if($user->userinfo->district == 'Panchagarh') selected="" @endif>Panchagarh</option>
											<option @if($user->userinfo->district == 'Rangpur') selected="" @endif>Rangpur</option>
											<option @if($user->userinfo->district == 'Thakurgaon') selected="" @endif>Thakurgaon</option>

											@elseif($user->userinfo->division == 'Sylhet')

											<!-- Sylhet Division -->
											<option @if($user->userinfo->district == 'Habiganj') selected="" @endif>Habiganj</option>
											<option @if($user->userinfo->district == 'Maulvibazar') selected="" @endif>Maulvibazar</option>
											<option @if($user->userinfo->district == 'Sunamganj') selected="" @endif>Sunamganj</option>
											<option @if($user->userinfo->district == 'Sylhet') selected="" @endif>Sylhet</option>

											@endif

										</select>
									</div>
									@if ($errors->has('district'))
									<span class="help-block">
										<strong>{{ $errors->first('district') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('address') ? ' has-error' : '' }}">
										<label>Home Address</label><br>
										<!-- <input  type="message" placeholder="Enter Your Address" value="{{ $user->address }}" name="address" required="" class="details"> -->
										<textarea value="Address"  name="address" class="details" placeholder="Write Your Address" onfocus="this.value = '';" onblur="	if (this.value == '') {this.value = 'Address'}"> {{ $user->userinfo->address }} </textarea>
									</div>
									@if ($errors->has('address'))
									<span class="help-block">
										<strong>{{ $errors->first('address') }}</strong>
									</span>
									@endif
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<div class="key{{ $errors->has('about') ? ' has-error' : '' }}">
										<label>Write Something About You</label><br>
										<!-- <input  type="text" placeholder="Enter Your Address" value="{{ $user->about }}" name="about" required="" class="details"> -->
										<textarea  name="about" value="Message" class="a_details" placeholder="Write About You Shortly" onfocus="this.value = '';" onblur="	if (this.value == '') {this.value = 'Message'}">{{ $user->userinfo->about }}</textarea>
									</div>
									@if ($errors->has('about'))
									<span class="help-block">
										<strong>{{ $errors->first('about') }}</strong>
									</span>
									@endif
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<!-- Address & Details End -->


						<div>
							<button type="submit" name="submit" class="btn btn-success"> Update </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	{{-- User Image Change --}}
	<script type="text/javascript">
		$('#imageupload').on("click",function(e){
			e.preventDefault();
		});
	</script>

	{{-- Show District by select Divison --}}
	<script type="text/javascript">
		$(document).ready(function() {
			$('#divisions').change(function() {
				var selected = $(this).val(); 
				
				$("#districts").empty();
				
				if (selected == 'Dhaka') {
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Dhaka</option><option>Faridpur</option><option>Gazipur</option><option>Gopalganj</option><option>Kishoreganj</option><option>Madaripur</option><option>Manikganj</option><option>Munshiganj</option><option>Narayanganj</option><option>Narshingdi</option><option>Rajbari</option><option>Shariatpur</option><option>Tangail</option>")
				}


				else if(selected == 'Sylhet'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Habiganj</option><option>Maulvibazar</option><option>Sunamganj</option><option>Sylhet</option>")
				}
				else if(selected == 'Rangpur'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Dinajpur</option><option>Gaibandha</option><option>Kurigram</option><option>Lalmonirhat</option><option>Nilphamari</option><option>Panchagarh</option><option>Rangpur</option><option>Thakurgaon</option>")
				}

				else if(selected == 'Rajshahi'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Bogra</option><option>Naogaon</option><option>Joypurhat</option><option>Natore</option><option>Nawabganj</option><option>Pabna</option><option>Rajshahi</option><option>Sirajganj</option>")
				}

				else if(selected == 'Khulna'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Bagerhat</option><option>Chuadanga</option><option>Jessore</option><option>Jhenaidah</option><option>Khulna</option><option>Kushtia</option><option>Magura</option><option>Meherpur</option><option>Narail</option><option>Sathkhira</option>")
				}

				else if(selected == 'Mymensingh'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Jamalpur</option><option>Mymensingh</option><option>Netrokona</option><option>Sherpur</option>")
				}

				else if(selected == 'Chattagram'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Bandarban</option><option>Brahmanbaria</option><option>Chandpur</option><option>Chattagram</option><option>Comilla</option><option>Coxs Bazar</option><option>Feni</option><option>Khagrachhari</option><option>Lakshmipur</option><option>Noakhali</option><option>Rangamati</option>")
				}

				else if(selected == 'Barishal'){
					$('#districts').append("<option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option>Barguna</option><option>Barishal</option><option>Bhola</option><option>Jhalokathi</option><option>Patuakhali</option><option>Pirojpur</option>")
				}

				
			});



			$('#addmoreeducation').click(function(e) {
				
				e.preventDefault();
				
				$('.addmoreeducation').append("<div class='col-sm-4'><div class='form-group'><div class='key{{ $errors->has('education') ? ' has-error' : '' }}'><label>Educational Qualification</label><br><select class='form-control' name='degree_name[]'><option value='-1' selected='selected' disabled='disabled'>-- Select --</option><option @if($user->educations == 'Phd/Doctorate') selected="" @endif>Phd/Doctorate</option><option @if($user->educations == 'Masters') selected="" @endif>Masters</option><option @if($user->educations == 'MBA') selected="" @endif>MBA</option><option @if($user->educations == 'Bachelor') selected="" @endif>Bachelor</option><option @if($user->educations == 'BBA') selected="" @endif>BBA</option><option @if($user->educations == 'Diploma') selected="" @endif>Diploma</option><option @if($user->educations == 'HSC') selected="" @endif>HSC</option><option @if($user->educations == 'SSC') selected="" @endif>SSC</option><option @if($user->educations == 'Dakhil') selected="" @endif>Dakhil</option><option @if($user->educations == 'Alim') selected="" @endif>Alim</option><option @if($user->educations == 'Fajil') selected="" @endif>Fajil</option><option @if($user->educations == 'Kamil') selected="" @endif>Kamil</option></select></div>@if ($errors->has('education'))<span class='help-block'><strong>{{ $errors->first('education') }}</strong></span>@endif</div></div><div class='col-sm-4'><div class='form-group'><div class='key{{ $errors->has('institute') ? ' has-error' : '' }}'><label>Institute</label><br><input type='text' name='institute[]' class='form-control'></div>@if ($errors->has('institute'))<span class='help-block'><strong>{{ $errors->first('institute') }}</strong></span>@endif</div></div><div class='col-sm-4'><div class='form-group'><div class='key{{ $errors->has('passing_year') ? ' has-error' : '' }}'><label>Passing Year</label><br><input type='text' name='passing_year[]' class='form-control'></div>@if ($errors->has('passing_year'))<span class='help-block'><strong>{{ $errors->first('passing_year') }}</strong></span>@endif</div></div>")
				

			});



		});
	</script>



	


@endsection







