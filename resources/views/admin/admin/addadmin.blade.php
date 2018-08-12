@extends('admin.layouts.master')

@section('title')
	<title>Add Admin | Matchup</title>
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
					<a href="/matchup/dashboard">Dashboard</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a href="/matchup/admin">Admin</a>
				</li>
				<li style="padding: 0px 5px;"> / </li>
				<li>
					<a>Add New Admin</a>
				</li>
			</ul>

			{{-- Content --}}
			<br>
			<form method="post" action="/matchup/admin/add">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label class="n">Name : </label>
					<input type="text" name="name" placeholder="Name" required="" value="{{ old('name') }}" class="form-control" style="width: 60%;">
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label class="n">Email : </label>
					<input type="email" name="email" placeholder="Email" required="" value="{{ old('email') }}" class="form-control" style="width: 60%;">
					@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>


				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
					<label class="n">Role : </label>
					<select class="form-control" name="role">
						<option value="-1">--Select--</option>
						<option> Editor </option>
						<option> Moderator </option>
					</select>
					@if ($errors->has('role'))
					<span class="help-block">
						<strong>{{ $errors->first('role') }}</strong>
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