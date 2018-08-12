@extends('layouts.master')

@section('content')

	<div class="container">

		@if (session('status'))
            <div class="alert alert-success">
        	{{ session('status') }}
            </div>
        @endif

        <!-- Form Start -->

      	<form class="reset form-horizontal col-md-6 col-md-offset-3" action="{{ route('password.email') }}" method="post"  id="reset_password">
      		{{ csrf_field() }}

      	<fieldset class="shadow">

      		<div class="card-header"><h1>{{ __('Reset Password') }}</h1></div>

	      		<div class="form-group ">
				<label class="col-md-4 control-label">{{ ('E-Mail Address') }}</label>  
				   	<div class="col-md-4">
				   		<div class="input-group">
				        
				        	<input id="email" type="email" placeholder="Enter Your E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

				          	@if ($errors->has('email'))
				            	<span class="invalid-feedback">
				                	<strong>{{ $errors->first('email') }}</strong>
				            	</span>
				        	@endif
				      	</div>    
				    </div>
				</div>

			<div class="form-group">
			 <label class="col-md-4 control-label" > {{ ('Password') }} </label> 
			    <div class="col-md-4 inputGroupContainer">
			      	<div class="input-group">
			        <!-- <span class="input-group-addon"><i class="fa fa-key" style="color:black;"></i></span> -->
			          	<input name="password" placeholder="Password" class="form-control"  type="password">
			      	</div>

				      	@if ($errors->has('password'))
				            <span class="invalid-feedback">
				                <strong>{{ $errors->first('password') }}</strong>
				            </span>
				        @endif
			    </div>
			</div>


			<div class="form-group">
			 <label class="col-md-4 control-label" > {{ ('Confirm Password') }}</label> 
			    <div class="col-md-4 inputGroupContainer">
			      	<div class="input-group">
			        <!-- <span class="input-group-addon"><i class="fa fa-key" style="color:black;"></i></span> -->
			          	<input name="password_confirmation" placeholder="Confirm Password" class="form-control"  type="password">

			      	</div>
			    </div>

			    	@if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
			</div>

			<div class="form-group">
		  	<label class="col-md-4 control-label"></label>
		    	<div class="col-md-4"><br>
		      		<center><button type="submit" class="btn btn-warning" > {{ ('Reset') }} <span class="glyphicon glyphicon-ok"></span></button></center>
		    	</div>
			</div>
		</fieldset>
		</form>
	</div>



@endsection