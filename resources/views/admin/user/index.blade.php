@extends('admin.layouts.master')

@section('title')
	<title>User | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>User</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>User</a>
				</li>
			</ul>

			
			<div class="search" >
				<input type="text" name="" class="form-control usersearch" placeholder="Search User">
			</div>
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>User Name</th>
					<th>User Email</th>
					<th>User Level</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody id="user">
					@if (count($users) == 0)
					<tr>
						<td colspan="4"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($users as $user)
					<tr class="user{{ $user->id }}" @if($user->seen == '0') style="background: #F5F4F4;" @endif>
						<td>{{ $i }}</td>
						<td class="name{{$user->id}}">{{ $user->name }}</td>
						<td class="email{{$user->id}}">{{ $user->email }}</td>
						<td class="level{{$user->id}}">{{ $user->userinfo->user_level }}</td>
						<td class="status{{$user->id}}"> @if($user->status == '0') Banned @else Active @endif </td>
						<td>
							<a href="/matchup/user/view/{{ $user->id }}" data-id="{{ $user->id }}" class="btn btn-outline-info editdata" >View</a>
							@if ($user->status == '0')
							<a href="" title="Unban" data-toggle="modal" data-target="#unbanmodal" data-id="{{ $user->id }}" class="btn btn-outline-danger unban{{ $user->id }} unbandata">Unban</a>
							@else
							<a href="" title="Ban" data-toggle="modal" data-target="#banmodal" data-id="{{ $user->id }}" class="btn btn-outline-danger ban{{ $user->id }} bandata">Ban</a>
							@endif
						</td>
					</tr>
					@php $i++; @endphp
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>





	<!-- Ban User Modal -->
	<div class="modal fade" id="banmodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Ban User</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to ban this user?
				</div>
				<div class="modal-footer">
					<button type="button" id="bans" data-id="" class="btn btn-danger">Ban</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	<!-- Unban User Modal -->
	<div class="modal fade" id="unbanmodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Unban User</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to unban this user?
				</div>
				<div class="modal-footer">
					<button type="button" id="unbans" data-id="" class="btn btn-danger">Unban</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

@endsection