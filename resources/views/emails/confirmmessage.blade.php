@extends('layouts.master')

@section('content')

<br><br><br>

<br><br><br>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><h1>Confirmation !</h1></div>
        <div class="panel-body">
          <h2> Thanks for signing up!</h2>
          <p>
          We have a verification request to your email address.</a> Check your email to Confirm !
        </p>
      </div>
    </div>
  </div>
</div>
</div>

<br><br><br><br><br><br><br>

{{-- <script type="text/javascript">
	$(document).ready(function() {
    window.history.pushState(null, "", window.location.href);        
    window.onpopstate = function() {
      window.history.pushState(null, "", window.location.href);
    };
  });
</script> --}}




@endsection