@extends('layouts.master')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">District</div>
			<div class="panel-body">
				<form method="POST" action="{{ route('district.store') }}" >
					{{ csrf_field() }}
				  <div class="form-group">
				    <label for="exampleInputEmail1">District</label>
				    <input type="text" class="form-control" name="district" id="exampleInputEmail1" placeholder="District">
				  </div>
				  
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
	</div>


</div>
@endsection