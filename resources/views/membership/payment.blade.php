@extends('layouts.master')

@section('content')
<style type="text/css">
header{
	padding-top: 40px;
}
</style>
<div class="">
	<div class="container member">

		<h2>Select Payment Option</h2>
		<form method="post" action="/membership/payment">	
		{{ csrf_field() }}
		<div class="col-md-12">
			
			
				<div class="col-md-3">
					<input type="radio" name="payment" value="bank"> Bank Payment 
				</div>
				<div class="col-md-3">
					<input type="radio" name="payment" value="bKash"> bKash 
				</div>
				<div class="col-md-3">
					<input type="radio" name="payment" value="rocket"> DBBL Rocket 
				</div>
				<br>
			
		</div>

		<button type="submit" class="btn btn-success" style="margin-top: 20px; margin-left: 30px;">Continue</button>
		</form>


	</div>
</div>


@endsection