<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body>
    Hello {{ $user->name }},
    <h1>You have requested to recover your password.</h1> 
    <p>Please click this link to reset your password :</p> 
    <p>
        <a href='{{ url("password/resets/{$user->email_token}") }}'>Reset Password</a>
    </p> 
    <p>Thank you!</p> <br>
    <p><strong>Regards</strong></p>
    <p>MATCHup</p>
</body>
</html>
