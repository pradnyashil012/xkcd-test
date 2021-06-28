<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP for verification</title>
</head>
<body>
    <h2>Verification Mail</h2>

    <p>Hello User</p>
    <a href="http://127.0.0.1:8000/verify?code={{$mail_data['verification_code']}}"> Click here to verify></a>
   
    <p>Thank you</p>
</body>
</html>