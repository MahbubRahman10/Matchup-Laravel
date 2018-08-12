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
					<a href="/matchup/succes-sstory">Success Story</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Edit Success Story</a>
				</li>
			</ul>

			{{-- Content --}}
			<br>
			<form method="post" action="/matchup/success-story/edit/{{ $id }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label class="n">Title : </label>
					<input type="text" name="title" placeholder="Title" required="" value="{{ $successstory->title }}" class="form-control" style="width: 60%;">
					@if ($errors->has('title'))
					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>
					@endif
				</div>


				<div class="form-group">
					<label class="n">Image : </label>
					<input type="file" name="image" placeholder="Image"  class="form-control" style="width: 60%;">
				</div>

				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					<label class="n">Description : </label>
					<textarea  name="description" class="form-control" style="width: 60%; height: 150px; border-radius: 0px;">{{ $successstory->description }}</textarea>
					@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
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