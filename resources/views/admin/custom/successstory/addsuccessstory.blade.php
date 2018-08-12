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
					<a>Add Success Story</a>
				</li>
			</ul>

			{{-- Content --}}
			<br>
			<form method="post" action="/matchup/success-story/add" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label class="n">Title : </label>
					<input type="text" name="title" placeholder="Title" required="" value="{{ old('title') }}" class="form-control" style="width: 60%;">
					@if ($errors->has('title'))
					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>
					@endif
				</div>


				<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
					<label class="n">Image : </label>
					<input type="file" name="image" placeholder="Image" required="" value="{{ old('image') }}" class="form-control" style="width: 60%;">
					@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
					<label class="n">Description : </label>
					<textarea  name="description" class="form-control" style="width: 60%; height: 150px; border-radius: 0px;"></textarea>
					@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
					@endif
				</div>



				<div>
					<button type="submit" class="btn btn-success"> Add </button>
				</div>

			</form>

		</div>
	</div>




	
	

@endsection