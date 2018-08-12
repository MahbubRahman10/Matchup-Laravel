@extends('admin.layouts.master')

@section('title')
	<title>Admin | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Admin</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="\matchup\dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Admin</a>
				</li>
			</ul>

			
			<div class="search" >
				@if (Auth::guard('admin')->user()->role == 'Superadmin')
					<a href="/matchup/admin/add" style="float: left; margin-right: 20px;" class="btn btn-primary">Add</a>
				@endif
				<input type="text" name="" class="form-control adminsearch" placeholder="Search Admin">
			</div>
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>Admin Name</th>
					<th>Admin Role</th>
					<th>Admin Email</th>
					<th>Action</th>
				</thead>
				<tbody id="admin">
					@if (count($admins) == 0)
					<tr>
						<td colspan="5"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($admins as $admin)
					<tr class="admin{{ $admin->id }}" {{-- @if($user->seen == '0') style="background: #F5F4F4;" @endif --}}>
						<td>{{ $i }}</td>
						<td class="admin{{$admin->id}}">{{ $admin->name }}</td>
						<td class="admin{{$admin->id}}">{{ $admin->role }}</td>
						<td class="admin{{$admin->id}}"> {{ $admin->email }} </td>
						<td>
							<a href="/matchup/admin/view/{{ $admin->id }}" data-id="{{ $admin->id }}" class="btn btn-outline-info editdata" >View</a>
							@if (Auth::guard('admin')->user()->role == 'Superadmin')
							<a href="" title="Delete" data-toggle="modal" data-target="#admindeletemodal" data-id="{{ $admin->id }}" class="btn btn-outline-danger admindelete">Delete</a>
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




	<!-- Unban User Modal -->
	<div class="modal fade" id="admindeletemodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Delete Admin</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to delete to unban this admin?
				</div>
				<div class="modal-footer">
					<button type="button" id="deleteadmin" data-id="" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

@endsection