@extends('admin.layouts.master')

@section('title')
	<title>Admin Profile | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Admin Profile</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\matchup\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>{{ $admin->name }} Profile</a>
				</li>
			</ul>

			<div class="container">
				@if(session()->has('message'))
				<div class="alert alert-success">
					<h6> {{ session()->get('message') }} </h6>
				</div>
				@endif

				@if(session()->has('error'))
				<div class="alert alert-danger">
					<h6> {{ session()->get('error') }} </h6>
				</div>
				@endif

				<div class="row">
					<div class="col-md-6">
						@if(Auth::guard('admin')->user()->image) <img src="/{{ Auth::guard('admin')->user()->image }}" alt="user" style="height: 250px; width: 250px;" id="aimg"> @else <img src="/admin/image/download.png" alt="user" style="height: 250px; width: 250px;" id="aimg"> @endif
						<br><br>
						<div>
							<a href="" class="btn btn-outline-success" id="imageupload" style="float: left; margin-right: 3px;"  onclick="document.getElementById('fileupload').click()">Change Image</a> 

							<form method="post" action="/matchup/profile/image" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="file" id="fileupload" name="image" id="afiles" onchange="document.getElementById('aimg').src = window.URL.createObjectURL(this.files[0])" style="display: none;">
								<button type="submit" id="abutton" style="float: left; margin-right: 3px; display: none;" class="btn btn-outline-success" >Save Change</button>

							</form>


							<a href="" class="btn btn-outline-primary" data-toggle="modal" data-target="#changepassword">Change Password</a>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Name : {{ $admin->name }} </h4> <br>
						<h4>Email : {{ $admin->email }} </h4> <br>
						<h4>Role : {{ $admin->role }} </h4> <br>
					</div>
				</div>
			</div>
			

			<!-- Change Password Modal -->
			<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="post" action="/matchup/profile/changepassword">
							{{ csrf_field() }}
							<div class="modal-header deletemodals">
								<h5 class="modal-title" id="exampleModalLabel"> <strong> Change Password</strong></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body"> 
								<label>Old Password</label><br>
								<input type="password" name="oldpassword" class="form-control" style="border-radius: 0px;">
								<label>New Password</label>
								<input type="password" name="password" class="form-control" style="border-radius: 0px;">
								<label>Confirm Password</label><br>
								<input type="password" name="password_confirmation" class="form-control" style="border-radius: 0px;">
							</div>
							<div class="modal-footer">
								<button type="submit" id="" data-id="" class="btn btn-success">Change</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							</div>	
						</form>			
					</div>
				</div>
			</div>



		</div>
	</div>

	<script type="text/javascript">
		$('#imageupload').on("click",function(e){
			e.preventDefault();

			$(this).css('display', 'none');
			$('#abutton').css('display', 'block');
		});
	</script>




@endsection