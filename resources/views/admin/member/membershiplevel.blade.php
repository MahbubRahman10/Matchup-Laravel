@extends('admin.layouts.master')

@section('title')
	<title>Membership Level | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Membership Level</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Membership Level</a>
				</li>
			</ul>
			
			<div class="search" >
				<a href="" title="reject" data-toggle="modal" data-target="#membershipleveladd"" style="float: left; margin-right: 20px;" class="btn btn-primary">Add</a>
				<input type="text" name="" class="form-control membershiplevelsearch" placeholder="Search Membership Level">
			</div>

			{{-- Error --}}
			@if ($errors->has('level'))
			<span class="help-block">
				<div class="alert alert-danger">
					<strong>{{ $errors->first('level') }}</strong>
				</div>
			</span>
			@elseif ($errors->has('price'))
			<span class="help-block">
				<div class="alert alert-danger">
					<strong>{{ $errors->first('price') }}</strong>
				</div>
			</span>
			@elseif ($errors->has('expiration'))
			<span class="help-block">
				<div class="alert alert-danger">
					<strong>{{ $errors->first('expiration') }}</strong>
				</div>
			</span>
			@elseif (\Session::has('success'))
			<div class="alert alert-success">
				
					{!! \Session::get('success') !!}
				
			</div>
			@endif

			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>Level Name</th>
					<th>Price</th>
					<th>Expiration</th>
					<th>Action</th>
				</thead>
				<tbody id="membershiplevel">
					@if (count($membershiplevels) == 0)
					<tr>
						<td colspan="8"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($membershiplevels as $membershiplevel)
					<tr class="membershiplevel{{ $membershiplevel->id }}" {{-- @if($user->seen == '0') style="background: #F5F4F4;" @endif --}}>
						<td>{{ $i }}</td>
						<td class="level{{ $membershiplevel->id }}">{{ $membershiplevel->level }}</td>
						<td class="price{{ $membershiplevel->id }}">{{ $membershiplevel->price }}</td>
						<td class="expiration{{ $membershiplevel->id }}">{{ $membershiplevel->time }} Days</td>

						<td>
							<a href="" title="approved" data-toggle="modal" data-target="#membershipleveledit" data-id="{{ $membershiplevel->id }}" class="btn btn-outline-info editmembershiplevel">Edit</a>
							
							<a href="" title="reject" data-toggle="modal" data-target="#membershipleveldelete"" data-id="{{ $membershiplevel->id }}" class="btn btn-outline-danger deletemembershiplevel">Delete</a>
						</td>
					</tr>
					@php $i++; @endphp
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>


	<!-- Add Membership Level -->
	<div class="modal fade" id="membershipleveladd" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<form method="post" action="/matchup/membershiplevel/setting/add">
				{{ csrf_field() }}
				<div class="modal-content">
					<div class="modal-header deletemodals">
						<h5 class="modal-title" id="exampleModalLabel"> <strong> Add Membership Level</strong></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body"> 
						
						<label>Level Name : </label>
						<input type="text" name="level" placeholder="Level Name" required="" class="form-control">
						<br>
						<label>Price : </label>
						<input type="text" name="price" placeholder="Price" required="" class="form-control">
						<br>
						<label>Expiration(Days) : </label>
						<input type="text" name="expiration" placeholder="Expiration" required="" class="form-control">

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Add</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>				
				</div>
			</form>
		</div>
	</div>


	<!-- Edit Membership Level -->
	<div class="modal fade" id="membershipleveledit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<form method="post" action="/matchup/membershiplevel/setting/edit">
				{{ csrf_field() }}
				<div class="modal-content">
					<div class="modal-header deletemodals">
						<h5 class="modal-title" id="exampleModalLabel"> <strong> Update Membership Level</strong></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body"> 
						<input type="hidden" name="id" id="ml_id">
						<label>Level Name : </label>
						<input type="text" name="level" id="level" placeholder="Level Name" required="" class="form-control">
						<br>
						<label>Price : </label>
						<input type="text" name="price" id="price" placeholder="Price" required="" class="form-control">
						<br>
						<label>Expiration(Days) : </label>
						<input type="text" name="expiration" id="expiration" placeholder="Expiration" required="" class="form-control">

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">Update</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>				
				</div>
			</form>
		</div>
	</div>





	<!-- Delete Membership Level -->
	<div class="modal fade" id="membershipleveldelete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Delete Membership Level</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to delete this level?
				</div>
				<div class="modal-footer">
					<button type="button" id="deletemembershiplevel" data-id="" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	
	

@endsection