<!DOCTYPE html>
<html>
<head>
	@include('admin/sections/head')
</head>
<body>
	<div id="container">
		@include('admin/sections/nav')
		<div class="content" id="content">
			<div class="nav">
				<a href="" class="bars" id="menu">
					<i class="fa fa-bars"></i>
				</a>
				<div class="navright">
					<div class="navright-left">	
					</div>
					<div class="navright-right">		
						<ul>
							<li class="dropdown profile_details_drop">
									<a href="#" class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
										<span> @if(Auth::guard('admin')->user()->image) <img src="/{{ Auth::guard('admin')->user()->image }}" alt="user" style="height: 40px; width: 40px; border-radius: 50%; margin: 5px 0px;"> @else <img src="/admin/image/download.png" alt="user" style="height: 40px; width: 40px; border-radius: 50%; margin: 5px 0px;"> @endif </span>
									</a>
									<ul class="dropdown-menu users-notify-list">
										<li>
											<a href="/matchup/admin/profile">{{-- <i class="fa fa-users"></i> --}} Profile</a>
										</li>
										{{-- <li>
											<a href="#"><i class="fa fa-key"></i> Change Password</a>
										</li> --}}
										<li>
											<a href="/admin/logout">Logout</a>
											
										</li>
									</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="maincontent">
				@yield('content')
			</div>
		</div>
	</div>
	@include('admin/sections/script')
</body>
</html>
