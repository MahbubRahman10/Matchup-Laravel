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
					<a>Message</a>
				</li>
			</ul>

			
			{{-- <div class="search" >
				<input type="text" name="" class="form-control messagesearch" placeholder="Search Message">
			</div> --}}
			{{-- Table --}}
			<table>
				<thead>
					<th>No.</th>
					<th>User Name</th>
					<th>User Email</th>
					<th>New Message</th>
					<th>Chat</th>
					<th>Action</th>
				</thead>
				<tbody id="message">
					@if (count($messages) == 0)
					<tr>
						<td colspan="4"><strong style="color: #4c4c4c;font-size: 18px;">No Data Available</strong></td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach ($messages as $message)
					<tr class="message{{ $message->id }}" @if($message->seen == '0') style="background: #F5F4F4;" @endif>
						<td>{{ $i }}</td>
						<td class="name{{$message->id}}">{{ $message->name }}</td>
						<td class="email{{$message->id}}">{{ $message->email }}</td>
						<td class="level{{$message->id}}"> @if($message->seen == '0') 1  @else 0 @endif </td>
						
						@if (count($adminchats) != '0')
						@foreach ($adminchats as $adminchat)
						@if ($adminchat->user_id == $message->user_id)
						<td class="status{{$message->id}}"> <a href="/matchup/admin/view/{{ $adminchat->admin_id }}" target="blank">  {{ $adminchat->name }} </a> </td>
						<td>
							
						</td>
						@else
						<td class="status{{$message->id}}"> No One </td>
						<td>
							<a href="/matchup/message/chat/{{ $message->user_id }}"  class="btn btn-outline-info" >Let's Chat</a>
						</td>
						@endif
						@endforeach
						@else
						<td class="status{{$message->id}}"> No One  </td>
						<td>
							<a href="/matchup/message/chat/{{ $message->user_id }}"  class="btn btn-outline-info" >Let's Chat</a>
						</td>
						@endif

						
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