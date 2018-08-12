@extends('layouts.master')

@section('content')
	<style type="text/css">
		header{
			padding-top: 40px;
		}
	</style>

	<div class="grid_3">
	 	<div class="container  membershipview">
	 		<div class="breadcrumb1">
	 			<ul>
	 				<a href="/"><i class="fa fa-home home_1"></i></a>
	 				<span class="divider"> | </span>
	 				<li class="current-page">Membership</li>
	 			</ul>
	 			<h1><center>Membership Catagories</center></h1>
	 			<br>

				<table id="membership">
				  <tr>
				    <th>Membership Level</th>
				    <th>Price</th>
				    <th></th>
				    
				  </tr>
				  @foreach($membershiplevels as $membershiplevel)
				  <tr>
				    <td>{{$membershiplevel->level }} ({{$membershiplevel->time }} days)</td>
				    <td>TK {{$membershiplevel->price }}</td>
				    <td> 
				     	<form method="post" action="/membership/online/payment">
				     		{{ csrf_field() }}
				     		<input type="hidden" name="memid" value="{{$membershiplevel->id }}" class="memid">
				     		<button class="reservationnumber">Member Online</button>
				     	</form>
				     </td>
				  </tr>
				  @endforeach
				  
				</table>

				<h1><center>Membership Benefits</center></h1>
				<br>
				<table id="benefits">
					<tr>
						<th>Benefits</th>
					</tr>
					<tr>
						<td>1. View all contact information.</td>
					</tr>
					<tr>
						<td>2. Top Position in search results.</td>
					</tr>
					<tr>
						<td>3. Enhanced support by our support team.</td>
					</tr>
					<tr>
						<td>4. Discounts.</td>
					</tr>
					
				</table>

				<h1><center>Interested to be a Member ?</center></h1>
				<br>
				<table id="membership">
					<tr>
				    	<th>EXIM Bank(Savings Deposit)</th>
				    	<th>DBBL Rocket</th>
				    	<th>BKash</th>
				  	</tr>
				  	<tr>
				    	<td>00912100213665</td>
				    	<td>01714-252870</td>
				    	<td>01714-252870</td>
				  	</tr>
				  	<table id="benefits">
				  		<!-- <tr>
				  			<td> <h5 style="margin: 20px 0px;"><a href="/membership/online" class="reservationnumber"> <span>Member Online</span> </a></h5> </td>
				  		</tr> -->
				  		<tr>
				  			<td>You Can Come Our Office To Pay 'OR' Contact WIth Us Before Payment</td>
				  		</tr>
				  	</table>
				</table>
				<h1><center>Office Hour</center></h1>
				<br>
				<address class="addr row">
					<dl class="grid_4">
						<dt>Address :</dt>
						<dd>
	 						AL Hamra(7th Floor),
	 						Zindabazar, Sylhet.
	 					</dd>
						
					</dl>
					<dl class="grid_4">
	 					<dt>Mobile :</dt>
	 					<dd>
	 						+88 01714-252870

	 					</dd>
	 				</dl>
	 				<dl class="grid_4">
	 					<dt>E-mail :</dt>
	 					<dd><a href="gmail.com">profinal2018@gmail.com</a></dd>
	 				</dl>
				</address>
				
				</div> 


	 			
	 		</div>
	 		
	 	</div>
	 </div>

@endsection