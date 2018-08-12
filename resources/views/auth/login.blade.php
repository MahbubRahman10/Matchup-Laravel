@extends('layouts.master')

@section('content')
<style type="text/css">
header{
  padding-top: 40px;
}
</style>
     <div class="container" id="login">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><i class="faa fa fa-lock"></i> Login </h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="login">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="usrname"><i class="fal fa fa-user-circle"></i> E-mail</label>
              <input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email">
              @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
              <label for="psw"><i class="fal fa fa-key"></i> Password</label>
              <input type="password" class="form-control" id="psw"  name="password" placeholder="Enter password">
              @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><i class="fal fa fa-check-circle"></i> Login</button>
          </form>
        </div>

        <div class="modal-footer">
          
          <p>Not a member? <a href="/register">Sign Up</a></p>
          <p>Forgot <a href="/password/reset">Password?</a></p>
        </div>
      </div>
</div>


@endsection




