@extends('layouts.master')

@section('content')
<style type="text/css">
header{
	padding-top: 40px;
}
</style>
<div class="">
	<div class="container member">

		<h2>Membership Payment</h2>
		<form method="post" action="/membership/payment/confirm" enctype="multipart/form-data">	
		{{ csrf_field() }}
		<div class="col-md-12">
			
			@if (Session::get('payment') == 'bank')
				
				<h3>Upload Bank Deposit Slip </h3><br>
				<input type="file" name="bank" class="form-control" required="" style="width: 50%;">

			@elseif (Session::get('payment') == 'bKash')
			
			<div class="paymentbKash">
				You should follow these steps to fulfill the order using BKash Payment Method
				<ul>
					<li>Please pay the bill to <span class="textStyle1">01714252870</span> by BKash (through agent if you has no BKash account).</li>
					<li>Please use <span class="textStyle1">"payment"</span> option from your mobile menu after dialing *247# (Or ask bKash agent to use <span class="textStyle1">payment</span> option
						to send money)
					</li>
					<li>After the transaction, take the Transaction ID (if you paid from BKash Agent, then collect from them)</li>
					<li>Now fulfill the form "<span class="textStyle1">Bkash Transaction Id</span>" and <span class="textStyle1">Submit</span>.</li>
				</ul>

				<div class="">
					<label>bkash Transaction Id : </label>
					<input type="text" name="transaction_id" >
				</div>

			</div>

			@elseif (Session::get('payment') == 'rocket')
			<div class="paymentbKash">
				You should follow these steps to fulfill the order using Rocket Payment Method
				<ul>
					<li>Go to rocket Menu by dialing <span class="textStyle1">*322#</span> 
					</li>
					<li>Choose ‘Send Money’</li>
					<li>Enter the Mobile/Account number “ 017142528702 “</li>
					<li>Enter the amount</li>
					<li>Now enter your PIN to confirm</li>
					<li>Done! You will get a confirmation SMS</li>
					<li>Now fulfill the form "<span class="textStyle1">Rocket Transaction Id</span>" and <span class="textStyle1">Submit</span>.</li>
				</ul>

				<div class="">
					<label>Rocket Transaction Id : </label>
					<input type="text" name="transaction_id" >
				</div>
			</div>

			@endif
			<br>
			
		</div>

		<button type="submit" class="btn btn-success" style="margin-top: 20px; margin-left: 30px;">Submit</button>
		</form>


	</div>
</div>


@endsection