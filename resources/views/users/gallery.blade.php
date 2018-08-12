@extends('layouts.master')
@section('title')
    <style type="text/css">
    	.modal-contents{
    		width: 100%;
    		background: white;
    	}
    </style>
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
						<li><a href="/profile/user"><i class="fas fa-user"></i> Profile </a></li>
						<li><a href="/profile/chat" class="sidebar-menu"><i class="fab fa-facebook-messenger"></i> Chat @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;"> {{ $chatstatus }} </span>  @endif </a></li>
						<li><a href="/profile/inbox" class="sidebar-menu"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif</a></li>
						<li><a href="/profile/edit" class="sidebar-menu"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu active"><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-9" id="usercontent">		


				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="usersetting">
					
					<h2>Your Gallery</h2>
					<br>
					<div style="text-align: center;">
						<a href="" class="btn btn-success"  data-toggle="modal" data-target="#myModal">Add</a>
						<a href="" class="btn btn-success removebtn">Remove</a>
					</div>
					<div class="row" style="margin-top: 80px;">
						<div class="col-md-12">
							@if (count($galleries) == '0')
								<h3 style="text-align: center;"><b>No Photo Available</b></h3>
							@else
								@foreach ($galleries as $gallery)
								<div class="col-md-4 data{{ $gallery->id }}">
									<a href="" class="removeimage" data-id="{{ $gallery->id }}" style="display: none;"><i class="fa fa-times "></i></a>
									<a href="/{{ $gallery->image }}" data-lightbox="1">
										<img src="/{{ $gallery->image }}" class="img-responsive" height="200" width="200" style="margin-bottom: 50px;">
									</a>
								</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Add Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<form method="post" action="/profile/gallery/add" enctype="multipart/form-data">
				<div class="modal-contents">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Photo to Gallery</h4>
					</div>
					<div class="modal-body">
						{{ csrf_field() }}
						<input type="file" name="image[]" multiple required="" class="form-control">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Add</button>
					</div>
				</div>
			</form>

		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {

			// Show Remove Button
			$(document).on('click', '.removebtn', function(event) {
				event.preventDefault();
				var display = $('.removeimage').css('display') 
				if (display == 'none') {
					$('.removeimage').fadeIn('slow');
				}
				else{
					$('.removeimage').fadeOut('slow');
				}
			});

			// Delete Image
			$(document).on('click', '.removeimage', function(event) {
				event.preventDefault();
				var id = $(this).data('id')
				$.ajax({
					type: 'get',
					url: '/profile/gallery/delete',
					data: {
						'id': id
					},
					success: function(data) {
						$('.data'+id).fadeOut('slow')
					}
				});
			});
		});
	</script>

@endsection


