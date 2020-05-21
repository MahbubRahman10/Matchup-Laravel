@extends('admin.layouts.master')

@section('title')
	<title>Meeting | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Meeting</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Meeting</a>
				</li>
			</ul>
			
			<div class="search" >
				<input type="text" name="" class="form-control meetingsearch" placeholder="Search Meeting">
			</div>
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>Profile_id</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Meeting Date</th>

					<th>Action</th>
				</thead>
				<tbody id="meeting">
					@if (count($meetings) == 0)
					<tr>
						<td colspan="5"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($meetings as $meeting)
					<tr class="meeting{{ $meeting->id }}" @if($meeting->status == '0') style="background: #F5F4F4;" @endif>
						<td>{{ $i }}</td>
						<td class="{{$meeting->id}}">{{ $meeting->profile_id }}</td>
						<td class="{{$meeting->id}}">{{ $meeting->name }}</td>
						<td class="{{$meeting->id}}">{{ $meeting->phone }}</td>
						<td class="{{$meeting->id}}">  {{ Carbon\Carbon::parse($meeting->date)->format('d F Y') }} </td>
						<td>
							<a href="/matchup/meeting/view/{{ $meeting->id }}" data-id="{{ $meeting->id }}" class="btn btn-outline-info" >View</a>
							
							<a href="" title="delete" data-toggle="modal" data-target="#meetingdeletemodal" data-id="{{ $meeting->id }}" class="btn btn-outline-danger meetingdelete">Delete</a>
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
	<div class="modal fade" id="meetingdeletemodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Delete Meeting</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to delete this meeting?
				</div>
				<div class="modal-footer">
					<button type="button" id="deletemeeting" data-id="" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	

@endsection