@extends('layouts.master')

@section('content')
<style type="text/css">
header{
	padding-top: 40px;
}
</style>
<div class="container">
	<div class="row viewuserprofile">
		<div class="row">
			<div class="col-md-6 userimage">
				<img src="/{{ $user->image }}" class="img-responsive img-thumbnail">
			</div>
			<div class="col-md-6 galleryimage">
				<h2>Photo Galleries</h2>
				@if (count($galleries) == 0)
				<h3 >Not Available</h3>				
				@else
				@foreach ($galleries as $gallery)
				<div class="col-sm-3">
					<a href="/{{ $gallery->image }}" data-lightbox="1"><img src="/{{ $gallery->image }}" class="img-responsive"></a>
				</div>
				@endforeach
				@endif
			</div>

			<div class="viewprofilebtn">
				<a href="/block/user/{{ $user->id }}" class="blockuser"><i class="fa fa-ban"></i> Block </a>
				@if(Auth::user()->userinfo->user_level != 'Registered' && $user->userinfo->user_level != 'Registered')
				<a href="/profile/chat/{{ $user->name }}/{{ $user->id }}" class="messageuser"><i class="fa fa-comments"></i> Message </a>
				@endif
			</div>
		</div>
		<br>

		@if(Auth::user()->userinfo->user_level == 'Registered')
		<div class="alert alert-warning" style="padding: 3px 10px;">
			<h3 style="font-size: 20px;">Be a <a href="/membership" style="">Paid Member</a> to view contact information</h3>
		</div>
		@endif
		<div class="row viewuserprofiledetails" style="margin-top: 30px;">
			<h2>Personal Info</h2>
			<div class="col-sm-4">
				<strong> Profile Id : {{ $user->profile_id }} </strong>
			</div>
			<div class="col-sm-4">
				Name : {{ $user->name }}
			</div>
			<div class="col-sm-4">
				Email : @if(Auth::user()->userinfo->user_level == 'Registered') Only Paid Member Can see This  @else {{ $user->email }} @endif
			</div>
			<div class="col-sm-4">
				Phone : Permission Needed
			</div>
			<div class="col-sm-4">
				Date of Birth : {{ $user->userinfo->date_of_birth?Carbon\Carbon::parse($user->userinfo->date_of_birth)->format('d F Y'):'N/A' }}
			</div>
			<div class="col-sm-4">
				Merital Status : {{ $user->userinfo->merital_status?$user->userinfo->merital_status:'N/A' }}
			</div>
			<div class="col-sm-4">
				Height : {{ $user->userinfo->height?$user->userinfo->height:'N/A' }}
			</div>
			<div class="col-sm-4">
				Weight : {{ $user->userinfo->weight?$user->userinfo->weight:'N/A' }} 
			</div>
			<div class="col-sm-4">
				Blood Group : {{ $user->userinfo->blood_group?$user->userinfo->blood_group:'N/A' }}
			</div>
			<div class="col-sm-4">
				Body Type : {{ $user->userinfo->body_type?$user->userinfo->body_type:'N/A' }}
			</div>
			<div class="col-sm-4">
				Drink : {{ $user->userinfo->drink?$user->userinfo->drink:'N/A' }}
			</div>
			<div class="col-sm-4">
				Smoke : {{ $user->userinfo->smoke }}
			</div>
		</div>
		<br>
		<div class="row viewuserprofiledetails" style="margin-top: 20px;">
			<h2>Family Info</h2>
			<div class="col-sm-4">
				Father's Profession : {{ $user->userinfo->fathers_occupation?$user->userinfo->fathers_occupation:'N/A' }}
			</div>
			<div class="col-sm-4">
				Mother's Profession : {{ $user->userinfo->mothers_occupation?$user->userinfo->mothers_occupation:'N/A' }}
			</div>
			<div class="col-sm-4">
				Brothers : {{ $user->userinfo->brothers?$user->userinfo->brothers:'N/A' }}
			</div>
			<div class="col-sm-4">
				Sisters : {{ $user->userinfo->sisters?$user->userinfo->sisters:'N/A' }}
			</div>
			<div class="col-sm-4">
				Children : {{ $user->userinfo->children?$user->userinfo->children:'N/A' }}
			</div>
			<div class="col-sm-4">
				Mother Tongue : {{ $user->userinfo->mother_tongue?$user->userinfo->mother_tongue:'N/A' }}
			</div>
			<div class="col-sm-4">
				Family Values : {{ $user->userinfo->family_values?$user->userinfo->family_values:'N/A' }}
			</div>
			<div class="col-sm-4">
				Body Type : {{ $user->userinfo->body_type?$user->userinfo->body_type:'N/A' }}
			</div>
			<!-- <div class="col-sm-4">
				Drink : {{ $user->userinfo->drink?$user->userinfo->drink:'N/A' }}
			</div>
			<div class="col-sm-4">
				smoke : {{ $user->userinfo->smoke?$user->userinfo->smoke:'N/A' }}
			</div> -->
		</div>

		<br>
		<div class="row viewuserprofiledetails" style="margin-top: 20px;">
			<h2>Education Info</h2>
			@if (count($user->educations) > 0)
			@foreach ($user->educations as $education)
			<div class="col-sm-4">
				Degree Name : {{ $education->degree_name }}
			</div>
			<div class="col-sm-4">
				Institution : {{ $education->institution }}
			</div>
			<div class="col-sm-4">
				Passing Year : {{ $education->passing_year }}
			</div>
			<br><br><br>
			@endforeach
			@else
			<h3 style="text-align: center; font-weight: bold; color: #4c4c4c;">Not Available</h3>
			@endif
			
		</div>

		<br>
		<div class="row viewuserprofiledetails" style="margin-top: 20px;">
			<h2>Address Info</h2>
			<div class="col-sm-4">
				Current Living Country : {{ $user->userinfo->country?$user->userinfo->country:'N/A' }}
			</div>
			<div class="col-sm-4">
				Home Residential : {{ $user->userinfo->residential_status?$user->userinfo->residential_status:'N/A' }}
			</div>
			<div class="col-sm-4">
				Division : {{ $user->userinfo->division?$user->userinfo->division:'N/A' }}
			</div>
			<div class="col-sm-4">
				District : {{ $user->userinfo->district?$user->userinfo->district:'N/A' }}
			</div>
			<div class="col-sm-4">
				Home Address : Permission Needed
			</div>
		</div>


	</div>
</div>




@endsection




