@extends('admin.layouts.master')

@section('title')
	<title>Subscriber | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Subscriber</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Subscriber</a>
				</li>
			</ul>
			
			<div class="search" >
				<input type="text" name="" class="form-control subscribersearch" placeholder="Search Subscriber">
			</div>
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>Subscriber Email</th>
					<th>Subscription Date</th>
					<th>Action</th>
				</thead>
				<tbody id="subscriber">
					@if (count($subscribers) == 0)
					<tr>
						<td colspan="5"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($subscribers as $subscriber)
					<tr class="subscriber{{ $subscriber->id }}" {{-- @if($user->seen == '0') style="background: #F5F4F4;" @endif --}}>
						<td>{{ $i }}</td>
						<td class="name{{$subscriber->id}}">{{ $subscriber->email }}</td>
						<td class="status{{$subscriber->id}}">  {{ Carbon\Carbon::parse($subscriber->created_at)->format('d F Y') }} </td>
						<td>
							<a href="" title="delete" data-toggle="modal" data-target="#subscriberdeletemodal" data-id="{{ $subscriber->id }}" class="btn btn-outline-danger subscriberdelete">Delete</a>
						</td>
					</tr>
					@php $i++; @endphp
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>




	<!-- Delete Guest Message Modal -->
	<div class="modal fade" id="subscriberdeletemodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Delete Subscriber</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to delete this subscriber?
				</div>
				<div class="modal-footer">
					<button type="button" id="deletesubscriber" data-id="" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	

@endsection