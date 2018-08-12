<header>
		<div class="container">
			
			<div class="drop-menu">
				<div class="btn-group" id="drop-menu"></div>
			</div>
			
			
				
			<div class="branding">
				<h1> <a href="{{ route('index') }}"> <span class="heighlight"> MATCH</span>up </a></h1>
						<a href="" class="menubar"><i class="fa fa-bars"></i> </a>
			</div>

			<nav class="navs full-width">
				<ul class="topnav" id="myTopnav">
					<li><a class="nav-a @if(Request::url() == 'http://localhost:8000') alive  @endif" href="{{ route('index') }}">Home</a></li>
					@if(Auth::user())
				  		<li><a class="nav-a @if(Request::url() == 'http://localhost:8000/advancedsearch') alive  @endif" href="/advancedsearch">Search</a></li>
				  	@endif
					
										
					
					
					@if(Auth::user() == false)

					{{-- <li><a class="nav-a @if(Request::url() == 'http://localhost:8000/advancedsearch') alive  @endif" href="/advancedsearch">Advanced Search</a></li> --}}

					<li><a class="nav-a @if(Request::url() == 'http://localhost:8000/login') alive  @endif" href="{{ route('login') }}">Login</a></li>
					<li><a class="nav-a @if(Request::url() == 'http://localhost:8000/register') alive  @endif" href="{{ route('register') }}">Registration</a></li>
					@endif

					<!-- <li><a href="{{ route('search') }}">Search</a></li> -->
					


					<!-- DROPDOWN -->

					
					<li>
						<div class="drop">
							<button class="dropbtn">Other Services 
								<i class="fa fa-caret-down"></i>
							</button>
							<div class="drop-content">
								<a href="{{ route('meeting') }}">Meeting Room</a>
								<a class="@if(Request::url() == 'http://localhost:8000/membership') alive  @endif" href="{{ route('member') }}">Membership</a>
							</div>
						</div> 
					</li>
				  	@if(Auth::user())
				  		<li>
				  			<div class="drop">
				  				<button class="dropbtn">{{ Auth::user()->name }}
				  					<i class="fa fa-caret-down"></i>
				  				</button>
				  				<div class="drop-con">
				  					<a href="/profile/user">My Profile</a>
				  					<a href="/logout">Logout</a>
				  				</div>
				  			</div>
				  		</li> 

				  	@endif
					
				</ul>
			</nav>
		</div>
		



{{-- 
		<div class="container">
			<div class="row chat-window col-xs-5 col-md-3" id="chat_window_1">
				<div class="col-xs-12 col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading top-bar ">
							<div class="col-md-8 col-xs-8">
								<h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
							</div>
							<div class="col-md-4 col-xs-4" style="text-align: right;">
								<a href="#"><span id="minim_chat_window" class="glyphicon icon_minim panel-collapsed glyphicon-plus"></span></a>
								<a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
							</div>
						</div>
						<div class="panel-body msg_container_base" style="display: none;">
							<div class="row msg_container base_sent">
								<div class="col-md-10 col-xs-10">
									<div class="messages msg_sent">
										<p>that mongodb thing looks good, huh?
										tiny master db, and huge document store</p>
										<time datetime="2009-11-13T20:00">Timothy • 51 min</time>
									</div>
								</div>
								<div class="col-md-2 col-xs-2 avatar">
									<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
								</div>
							</div>
							<div class="row msg_container base_receive">
								<div class="col-md-2 col-xs-2 avatar">
									<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
								</div>
								<div class="col-md-10 col-xs-10">
									<div class="messages msg_receive">
										<p>that mongodb thing looks good, huh?
										tiny master db, and huge document store</p>
										<time datetime="2009-11-13T20:00">Timothy • 51 min</time>
									</div>
								</div>
							</div>
							<div class="row msg_container base_receive">
								<div class="col-md-2 col-xs-2 avatar">
									<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
								</div>
								<div class="col-xs-10 col-md-10">
									<div class="messages msg_receive">
										<p>that mongodb thing looks good, huh?
										tiny master db, and huge document store</p>
										<time datetime="2009-11-13T20:00">Timothy • 51 min</time>
									</div>
								</div>
							</div>
							<div class="row msg_container base_sent">
								<div class="col-xs-10 col-md-10">
									<div class="messages msg_sent">
										<p>that mongodb thing looks good, huh?
										tiny master db, and huge document store</p>
										<time datetime="2009-11-13T20:00">Timothy • 51 min</time>
									</div>
								</div>
								<div class="col-md-2 col-xs-2 avatar">
									<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
								</div>
							</div>
							<div class="row msg_container base_receive">
								<div class="col-md-2 col-xs-2 avatar">
									<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
								</div>
								<div class="col-xs-10 col-md-10">
									<div class="messages msg_receive">
										<p>that mongodb thing looks good, huh?
										tiny master db, and huge document store</p>
										<time datetime="2009-11-13T20:00">Timothy • 51 min</time>
									</div>
								</div>
							</div>
							<div class="row msg_container base_sent">
								<div class="col-md-10 col-xs-10 ">
									<div class="messages msg_sent">
										<p>that mongodb thing looks good, huh?
										tiny master db, and huge document store</p>
										<time datetime="2009-11-13T20:00">Timothy • 51 min</time>
									</div>
								</div>
								<div class="col-md-2 col-xs-2 avatar">
									<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
								</div>
							</div>
						</div>
						<div class="panel-footer" style="display: none;">
							<div class="input-group">
								<input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
								<span class="input-group-btn">
									<button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
 --}}







		
		</header>
			{{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
				<script type="text/javascript">
					$(document).ready(function(){
				    	$(".menubar").click(function(e){
				    		e.preventDefault()
				        	

				        	var display=$( ".navs" ).hasClass( "navs-tab")
				        	if (display == false) {
				        		$('.navs').addClass('navs-tab')
				        	}
				        	else{
				        		$('.navs').removeClass('navs-tab')
				        	}
				    	});
					});
				</script>








{{-- 				<script type="text/javascript">
					$(document).on('click', '.panel-heading span.icon_minim', function (e) {
						var $this = $(this);
						if (!$this.hasClass('panel-collapsed')) {
							$this.parents('.panel').find('.panel-body').slideUp();
							$this.parents('.panel').find('.panel-footer').slideUp();
							$this.addClass('panel-collapsed');
							$this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
						} else {
							$this.parents('.panel').find('.panel-body').slideDown();
							$this.parents('.panel').find('.panel-footer').slideDown();
							$this.removeClass('panel-collapsed');
							$this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
						}
					});
					$(document).on('focus', '.panel-footer input.chat_input', function (e) {
						var $this = $(this);
						if ($('#minim_chat_window').hasClass('panel-collapsed')) {
							$this.parents('.panel').find('.panel-body').slideDown();
							$('#minim_chat_window').removeClass('panel-collapsed');
							$('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
						}
					});
					$(document).on('click', '#new_chat', function (e) {
						var size = $( ".chat-window:last-child" ).css("margin-left");
						size_total = parseInt(size) + 400;
						alert(size_total);
						var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
						clone.css("margin-left", size_total);
					});
					$(document).on('click', '.icon_close', function (e) {
						$( "#chat_window_1" ).remove();
					});

				</script> --}}