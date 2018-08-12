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
						<li><a href="/profile/chat" class="sidebar-menu"><i class="fab fa-facebook-messenger"></i> Chat @if($chatstatus > 0)  <span id="chatstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">{{ $chatstatus }}</span>  @endif </a></li>
						<li><a href="/profile/inbox" class="sidebar-menu active"><i class="fas fa-envelope"></i> Chat with admin @if($messagesstatus == 1)  <span id="messagesstatus" class="messagesstatus" style="background: #C32143; padding: 5px 10px; font-weight: bold; margin-left: 5px; border-radius: 10%;">1</span>  @endif </a></li>
						<li><a href="/profile/edit" class="sidebar-menu"><i class="fas fa-user-edit"></i> Edit Profile </a></li>
						<li><a href="/profile/setting" class="sidebar-menu"><i class="fa fa-cogs"></i> Account Setting </a></li>
						<li><a href="/profile/gallery" class="sidebar-menu "><i class="far fa-image"></i> Photo Gallery </a></li>
						<li><a href="/profile/block-list" class="sidebar-menu"><i class="fas fa-user-lock"></i> Block List </a></li>
						<li><a href="/profile/membership" class="sidebar-menu"><i class="fas fa-handshake"></i> Membership </a></li>
						<li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9" id="usercontent">		
				<!-- Tab panes -->
				<div role="tabpanel" class="tab-pane active" id="usersetting">
					<h2>Your Inbox</h2>
					<div class="row" style="margin-top: 0px; "><br>
						

						<div class="col-sm-12 frame">
							<ul class="chat_ul">
								@foreach ($messages as $message)
									
									@if ($message->admin_id == null)
										<li style="width:100%"> 
									<div class="msj macro"> 
										<div class="text text-l">
											<p> {{ $message->message }} </p>
											<p><small> {{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }} </small></p>
										</div>
									</div> 
								</li>


									@else

									<li style="width:100%;"> 
									<div class="msj-rta macro"> 
										<div class="text text-r"> 
											<p> {{ $message->message }} </p>
											<p><small>{{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</small></p>
										</div>                            
									</li>

									@endif


								@endforeach

							</ul>
							<div>
								<div class="msj-rta macro">                        
									<div class="text text-r" style="background:whitesmoke !important;width: 100%;">
										<input class="mytext" placeholder="Type a message"/ data-id="{{ Auth::user()->id }}">
									</div> 

								</div>
								<div style="padding:10px;">
									<span class="glyphicon glyphicon-share-alt"></span>
								</div>                
							</div>
						</div>


						<!--chat_sidebar-->
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.mytext').on('keydown', function (e) {
				if(e.keyCode == 13) {
					var value = $(this).val()
					var id = $(this).data('id')
					var date = formatAMPM(new Date());
					if (value != '') {
						$.ajax({
							type: 'get',
							url: '/matchup/chat/message/send',
							data: {
								'id': id,
								'message': value
							},
							success: function(data) {
								
								$('.chat_ul').prepend("<li style='width:100%'><div class='msj macro'><div class='text text-l'><p> "+ value +" </p><p><small>" + date +  "</small></p></div></div></li>");
								$('.mytext').val('');

							}
						});
					}
				}
			})


			function formatAMPM(date) {
				var hours = date.getHours();
				var minutes = date.getMinutes();
				var ampm = hours >= 12 ? 'PM' : 'AM';
				hours = hours % 12;
			    hours = hours ? hours : 12; // the hour '0' should be '12'
			    minutes = minutes < 10 ? '0'+minutes : minutes;
			    var strTime = hours + ':' + minutes + ' ' + ampm;
			    return strTime;

			}	    


		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function(){   //calls click event after a certain time
				
				if ($('#messagesstatus').hasClass('messagesstatus') == true) {
					$('#messagesstatus').removeClass('messagesstatus')
					$('#messagesstatus').css('display', 'none');
				}
				else{ 
					getmsg();
				}
			}, 1000);

			function getmsg() {
				$.ajax({
					type: 'get',
					url: '/matchup/chat/message/getmsg',
					success: function(data) {

						for (var i = 0; i < data.length; i++) {
							$('.chat_ul').prepend("<li style='width:100%'><div class='msj-rta macro'><div class='text text-l' style='padding-right: 0px;'><p> "+ data[i].message +" </p><p><small>" + data[i].created_at +  "</small></p></div></div></li>");
							$('.mytext').val('');
						}

					}
				});
			}

		});
	</script>





@endsection


