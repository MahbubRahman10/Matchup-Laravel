@extends('layouts.master')

@section('content')
<style type="text/css">
header{
  padding-top: 40px;
}
</style>
	     <div class="container">

      <form class="well form-horizontal" action="/register" method="post"  id="registration" style="background: white; margin-top: 30px;margin-bottom: 30px;">

      	{{ csrf_field() }}

    <fieldset class="shadow">


    <h4 id="h4" style="padding: 5px 0px;  margin-bottom: 40px;"><i class="faa fa fa-lock" ></i> Registration</h4>


<div class="form-group">
  <label class="col-md-4 control-label" >Full Name</label> 
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user" style="color:black;"></i></span>
        <input name="full_name" placeholder="Full Name" class="form-control"  type="text" value="{{ old('full_name') }}">
      </div>
        @if ($errors->has('full_name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('full_name') }}</strong>
            </span>
        @endif
  </div>
</div>



<div class="form-group"> 
  <label class="col-md-4 control-label">Gender</label>
    <div class="col-md-4 selectContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-transgender" style="color:black;"></i></span>
          
          <select name="gender" class="form-control selectpicker">
            <option value="0">Select your Gender</option>
            <option  @if(old('gender') == 'male') selected="selected"  @endif value="male">Male</option>
            <option  @if(old('gender') == 'female') selected="selected"  @endif value="female">Female</option>
            <option  @if(old('gender') == 'other') selected="selected"  @endif value="other">Others</option>
          </select>
      </div>
       @if ($errors->has('gender'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
    </div>
</div>


  <div class="form-group"> 
    <label class="col-md-4 control-label">Religion</label>
      <div class="col-md-4 selectContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="fab fa-leanpub tyle="color:black;"></i></span>
            <select name="religion" class="form-control selectpicker">
              <option  value="0">Select your Religion</option>
              <option @if(old('religion') == 'islam') selected="selected"  @endif value="islam">Islam</option>
              <option  @if(old('religion') == 'hinduism') selected="selected"  @endif value="hinduism">Hinduism</option>
              <option  @if(old('religion') == 'christian') selected="selected"  @endif value="christian">Christianity</option>
              <option  @if(old('religion') == 'buddhist') selected="selected"  @endif value="buddhist">Buddhists</option>
              <option  @if(old('religion') == 'others') selected="selected"  @endif value="others">Others</option>
            </select>
        </div>
        @if ($errors->has('religion'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('religion') }}</strong>
            </span>
        @endif
      </div>
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-phone" style="color:black;"></i></span>
          <input name="contact_no" placeholder="(+88)" class="form-control" type="text" value="{{ old('contact_no') }}">
      </div>
      	@if ($errors->has('contact_no'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('contact_no') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope" style="color:black;"></i></span>
          <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value="{{ old('email') }}">
      </div>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key" style="color:black;"></i></span>
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
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key" style="color:black;"></i></span>
          <input name="password_confirmation" placeholder="Confirm Password" class="form-control"  type="password">
      </div>
    </div>
</div>

<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>


<div class="form-group">
  <label class="col-md-4 control-label"></label>
    <div class="col-md-4"><br>
      <center><button type="submit" class="btn btn-warning" > SUBMIT <span class="glyphicon glyphicon-ok"></span></button></center>
    </div>
</div>
</fieldset>


</form>
</div>

    <script type="text/javascript">
      
      $(document).ready(function() {
    $('#registration').bootstrapValidator({
        
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            full_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please enter your Full Name'
                    }
                }
            },
            //  last_name: {
            //     validators: {
            //          stringLength: {
            //             min: 2,
            //         },
            //         notEmpty: {
            //             message: 'Please enter your Last Name'
            //         }
            //     }
            // },
       // user_name: {
       //          validators: {
       //               stringLength: {
       //                  min: 8,
       //              },
       //              notEmpty: {
       //                  message: 'Please enter your Username'
       //              }
       //          }
       //      },
       password: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please enter your Password'
                    }
                }
            },
      confirm_password: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please confirm your Password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your Email Address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid Email Address'
                    }
                }
            },
            contact_no: {
                validators: {
                  stringLength: {
                        min: 11, 
                        max: 11,
                    notEmpty: {
                        message: 'Please enter your Contact No.'
                     }
                }
            },
       // department: {
       //          validators: {
       //              notEmpty: {
       //                  message: 'Please select your Department/Office'
       //              }
       //          }
       //      },
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow")
                $('#contact_form').data('bootstrapValidator').resetForm();

            e.preventDefault();

            var $form = $(e.target);

            var bv = $form.data('bootstrapValidator');

            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
    });
    </script>


@endsection




