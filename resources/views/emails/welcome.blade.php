<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to Our Application!</h1>
    <p>Dear {{ $user->firstname }},</p>
    <p>Thank you for signing up for our application. We're thrilled to have you on board!</p>
    <p>Feel free to explore our features and let us know if you have any questions or feedback.</p>
    <p>Best regards,<br>
       {{ config('app.name') }}
    </p>
</body>
</html>