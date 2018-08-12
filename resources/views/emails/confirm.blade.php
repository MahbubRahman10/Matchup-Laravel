<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp Confirmation</title>
</head>
<body>
	Hello {{ $user->name }},
    <h1>Thanks for signing up to MATCHup</h1> 
    <p><b>Please click the link below to verify your email address and activate your account :</b></p> 
    <p>
        <a href='{{ url("register/verify/{$user->token}") }}'>Click Here To Confirm Your Registration</a>
        
    </p> 
    <p><strong>With Thanks!</strong></p> <!-- <br> -->
    <p>Tawfiquzzaman Opu</p>
    <p>Founder</p>
    <p>MATCHup</p>
</body>
</html>