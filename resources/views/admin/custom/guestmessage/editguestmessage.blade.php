@extends('admin.layouts.master')

@section('title')
	<title>Update Guest Message | Matchup</title>
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
@endsection

@section('content')
	
	<div class="card">
		<div class="card-header">
			<b>Guest Message</b>
		</div>
		<div class="card-body">
			{{-- breadcrumb --}}
			<ul class="breadcrumb" section="bc">
				<li>
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/guestmessage">Guest Message</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Update Guest Message</a>
				</li>
			</ul>

			{{-- Content --}}
			<br>
			<form method="post" action="/matchup/guestmessage/edit/{{ $id }}">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label class="n">Title : </label>
					<input type="text" name="title" placeholder="Title" required="" value="{{ $guestmessage->title }}" class="form-control" style="width: 60%;">
					@if ($errors->has('title'))
					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('relation') ? ' has-error' : '' }}">
					<label class="n">Relation : </label>
					<input type="text" name="relation" placeholder="Relation" required="" value="{{ $guestmessage->relation }}" class="form-control" style="width: 60%;">
					@if ($errors->has('relation'))
					<span class="help-block">
						<strong>{{ $errors->first('relation') }}</strong>
					</span>
					@endif
				</div>


				<div class="form-group">
					<label class="n">Facebook : </label>
					<input type="text" name="facebook" placeholder="Facebook" value="{{ $guestmessage->facebook }}" class="form-control" style="width: 60%;">
				</div>

				<div class="form-group">
					<label class="n">Twitter : </label>
					<input type="text" name="twitter" placeholder="Twitter" value="{{ $guestmessage->twitter }}" class="form-control" style="width: 60%;">
				</div>

				<div class="form-group">
					<label class="n">Google Plus : </label>
					<input type="text" name="googleplus" placeholder="Google Plus" value="{{ $guestmessage->googleplus }}" class="form-control" style="width: 60%;">
				</div>

				<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
					<label class="n">Message : </label>
					<textarea  name="message" class="form-control" style="width: 60%; height: 150px; border-radius: 0px;">{{ $guestmessage->message }}</textarea>
					@if ($errors->has('message'))
					<span class="help-block">
						<strong>{{ $errors->first('message') }}</strong>
					</span>
					@endif
				</div>



				<div>
					<button type="submit" class="btn btn-primary"> Update </button>
				</div>

			</form>

		</div>
	</div>




	
	

@endsection