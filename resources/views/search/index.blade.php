@extends('layouts.master')

@section('content')
<style type="text/css">
header{
	padding-top: 40px;
}
.active{
	background: none;
}
</style>
<div class="container" style="margin-top: 30px;">
	<div class="row searchresult">
		@if (count($users) == 0)
			<div class="col-md-12" id="searchresult" style="padding: 60px 0px;">
				<h2>No Data Found</h2>
			</div>
		@else
		@foreach ($users as $user)			
		<div class="col-sm-3">
			<div id="searchresult">
				<a href="/{{ $user->image }}" data-lightbox="1"><img src="/{{ $user->image }}" class="img-responsive"></a>
				<br>
				<div id="searchresultdetails">
					<div class="searchbasic">
						<h3>Name : {{ $user->name }} </h3>
						<h5> Date of Birth : {{ Carbon\Carbon::parse($user->date_of_birth)->format('d F Y') }}</h5>
						<h5> Profession : {{ $user->occupation?$user->occupation:'N/A' }} </h5>
						<h5> Weight : {{ $user->weight?$user->weight:'N/A' }} </h5>
						<h5> Height :  {{ $user->height?$user->height:'N/A' }}  </h5>
					</div>
					@if (Auth::user())
					<h2> <a href="/user/profile/{{ $user->name }}/{{ $user->user_id }}" class="profilebtn hvr-bounce-in"> View Profile </a> </h2>
					@else
					<h2> <a href="/register" class="profilebtn hvr-bounce-in"> Register to view profile </a> </h2>
					@endif
				</div>
			</div>
		</div>
		@endforeach
		@endif	
	</div>	
	<div style="text-align: center;">{{ $users->appends(request()->except('page'))->links() }} </div>
</div>




@endsection




