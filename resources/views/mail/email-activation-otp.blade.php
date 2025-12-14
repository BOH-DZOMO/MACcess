<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <p>Hello {{ $user }},</p>
    <p>Your e-mail Activation code is </p>
    <p class=' text-red-700'> {{ $otp }} </p>
    <p class=' font-bold'>
        This verification code is for the mail activation.If you do not activate the mailbox within 10 minutes after
        receiving the mail,the meassage conetent will be invalid
    </p>
</body>

</html>
