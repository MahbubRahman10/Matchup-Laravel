@extends('admin.layouts.master')

@section('title')
	<title>Message | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Message</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/message">Message</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>{{ $user->name }}</a>
				</li>
			</ul>

			
			{{-- Message --}}
			
			<a href="/matchup/message/chat/close/{{ $user->id }}" class="btn btn-outline-primary" style="margin-bottom: 20px;">Close Chat</a>			
			<div class="col-sm-12 frame">
				<ul class="chat_ul">

					@foreach ($messages as $message)

					@if ($message->admin_id == null)
					<li style="width:100%"> 
						<div class="msj-rta macro"> 
							<div class="text text-l">
								<p> {{ $message->message }} </p>
								<p><small> {{ Carbon\Carbon::parse($message->created_at)->format('h:i A') }} </small></p>
							</div>
						</div> 
					</li>


					@else

					<li style="width:100%;"> 
						<div class="msj macro"> 
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
								<input class="mytext" placeholder="Type your message"/ data-id="{{ $user->id }}" style="height: 10px;">
							</div> 

						</div>
						<div style="padding:10px;">
							<span class="glyphicon glyphicon-share-alt"></span>
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
							url: '/admin/matchup/message/chat/send',
							data: {
								'id': id,
								'message': value
							},
							success: function(data) {
								
								$('.chat_ul').prepend("<li style='width:100%'><div class='msj macro'><div class='text text-l' style='padding-right: 0px;'><p> "+ value +" </p><p><small>" + date +  "</small></p></div></div></li>");
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
				getmsg();
			}, 1000);

			function getmsg() {

				var id = $('.mytext').data('id')

				$.ajax({
					type: 'get',
					url: '/admin/matchup/message/chat/getmsg',
					data: {
						'id': id
					},
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