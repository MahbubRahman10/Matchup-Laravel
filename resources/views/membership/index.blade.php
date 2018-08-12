@extends('layouts.master')

@section('content')
<style type="text/css">
header{
	padding-top: 40px;
}
</style>
<div class="">
	<div class="container member">

		<h2>Online Membership</h2>	
		<div class="col-md-12">
			<div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label>Membership Level</label>
				<select name="level" class="form-control membershiplevel">
					<option value="0"> --Select--</option>
					@foreach ($membershiplevels as $membershiplevel)
					<option value="{{ $membershiplevel->id }}"> {{ $membershiplevel->level }} </option>
					@endforeach
				</select>				
			</div>
		</div>

		<div class="showmembershipdetails">
			<form method="post" action="/membership/online/payment">
				{{ csrf_field() }}
				<input type="hidden" name="memid" class="memid">
				<table id="membership" style="margin-top: 180px">
					<tbody>
						<tr>
							<th>Membership Level</th>
							<th>Price</th>
							<th>Time</th>
						</tr>
						<tr style="background: white;">
							<td><span class="memname"> Bronze   </span> <span class="memtime"> (30 days) </span></td>
							<td>TK <span class="memprice"></span></td>
							<td><span class="memtime"></span> Days </td>
						</tr>
					</tbody>
				</table>
				<br>
				<button class="btn btn-success">Continue</button>
			</form>
		</div>


	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('change', '.membershiplevel', function(event) {
			event.preventDefault();
			var value = $(this).val();

			if (value == '0') {
				$('.showmembershipdetails').css('display', 'none');
			}
			else{
				$.ajax({
					type: 'get',
					url: '/membership/online/getlevel',
					data: {
						'id': value
					},
					success: function(data) {
						$('.memname').html(data.level)
						$('.memprice').html(data.price)
						$('.memtime').html(data.time)
						$('.memid').val(data.id)

						$('.showmembershipdetails').css('display', 'block');
					}
				});
			}


		});
	});
</script>

@endsection