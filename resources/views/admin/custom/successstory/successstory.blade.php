@extends('admin.layouts.master')

@section('title')
	<title>Success Story | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Success Story</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Success Story</a>
				</li>
			</ul>
			
			<div class="search" >
				<a href="/matchup/success-story/add" style="float: left; margin-right: 20px;" class="btn btn-primary">Add</a>
				<input type="text" name="" class="form-control successstorysearch" placeholder="Search Stories">
			</div>
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>Title</th>
					<th>Date</th>
					<th>Action</th>
				</thead>
				<tbody id="successstory">
					@if (count($successstories) == 0)
					<tr>
						<td colspan="5"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($successstories as $successstory)
					<tr class="successstory{{ $successstory->id }}" {{-- @if($user->seen == '0') style="background: #F5F4F4;" @endif --}}>
						<td>{{ $i }}</td>
						<td class="name{{$successstory->id}}">{{ $successstory->title }}</td>
						<td class="status{{$successstory->id}}">  {{ Carbon\Carbon::parse($successstory->created_at)->format('d F Y') }} </td>
						<td>
							<a href="/matchup/success-story/view/{{ $successstory->id }}" data-id="{{ $successstory->id }}" class="btn btn-outline-info" >View</a>
							
							<a href="/matchup/success-story/edit/{{ $successstory->id }}" title="edit" class="btn btn-outline-success">Edit</a>
							
							<a href="" title="delete" data-toggle="modal" data-target="#successstorydeletemodal" data-id="{{ $successstory->id }}" class="btn btn-outline-danger successstorydelete">Delete</a>
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
	<div class="modal fade" id="successstorydeletemodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true" data-dismiss="modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header deletemodals">
					<h5 class="modal-title" id="exampleModalLabel"> <strong> Delete Story</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> 
					Are you want to sure to delete this story?
				</div>
				<div class="modal-footer">
					<button type="button" id="deletesuccessstory" data-id="" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>				
			</div>
		</div>
	</div>

	

@endsection