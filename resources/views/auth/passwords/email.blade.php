@extends('layouts.master')

@section('content')

<div class="container">

    

    <form class="reset form-horizontal col-md-6 col-md-offset-3" action="{{ route('password.email') }}" method="post"  id="reset_password">
        {{ csrf_field() }}

        <fieldset class="shadow">

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            
            <div class="card-header"><h1 style="text-align: center; padding-bottom: 30px;">{{ __('Reset Password') }}</h1></div>

            <div class="form-group ">
              <label class="col-md-4 control-label">{{ ('E-Mail :') }}</label>  
              <div class="col-md-4">
                  <div class="input-group">

                    <input id="email" type="email" placeholder="Enter Your E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required style="width: 250px;">

                      @if ($errors->has('email'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>


            </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label"></label>
          <div class="col-md-4"><br>
              <center><button type="submit" class="btn btn-warning" > {{ ('Send') }} <span class="glyphicon glyphicon-ok"></span></button></center>
          </div>
      </div>

  </fieldset>
</form>
</div>



@endsection