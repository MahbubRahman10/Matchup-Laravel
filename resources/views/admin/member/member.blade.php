@extends('admin.layouts.master')

@section('title')
	<title>Membership | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Membership</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Membership</a>
				</li>
			</ul>
			
			<div class="search" >
				<input type="text" name="" class="form-control membershipsearch" placeholder="Search Membership">
			</div>
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>Profile Id</th>
					<th>Membership Level</th>
					<th>Paymet Option</th>
					<th>Transaction Id/Bank Slip</th>
					<th>Paymet Date</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody id="membership">
					@if (count($memberships) == 0)
					<tr>
						<td colspan="8"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($memberships as $membership)
					<tr class="membership{{ $membership->id }}" @if($membership->seen == '0') style="background: #F5F4F4;" @endif>
						<td>{{ $i }}</td>
						<td class="name">{{ $membership->user->profile_id }}</td>
						<td class="email">{{ $membership->membershiplevel->level }}</td>
						<td class="email">{{ $membership->payment_option }}</td>
						<td class="email"> @if($membership->transaction_id != null) {{ $membership->transaction_id }} @else <a href="/matchup/membership/bank/{{ $membership->id }}">Bank Slip</a>  @endif </td>
						<td class="">  {{ Carbon\Carbon::parse($membership->created_at)->format('d F Y') }} </td>
						<td class="email"><b>{{ $membership->status }}</b></td>
						<td>
							<a href="" title="approved" data-toggle="modal" data-target="#membershipapproved" data-id="{{ $membership->id }}" class="btn btn-outline-success membershipapproved">Approve</a>
							
							<a href="" title="reject" data-toggle="modal" data-target="#membershipreject"" data-id="{{ $membership->id }}" class="btn btn-outline-danger membershipreject">Reject</a>
						</td>
					</tr>
					@php $i++; @endphp
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>




	<!-- Approved Membership -->
	<div class="modal fade" id="membershipapproved" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Approve Membership</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you sure want to approve this membership request?
				</div>
				<div class="modal-footer">
					<button type="button" id="approved" data-id="" class="btn btn-success">Approve</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	<!-- Reject Membership -->
	<div class="modal fade" id="membershipreject" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Reject Membership</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to reject this membership?
				</div>
				<div class="modal-footer">
					<button type="button" id="reject" data-id="" class="btn btn-danger">Reject</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	

@endsection