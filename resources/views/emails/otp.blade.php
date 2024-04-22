<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP for Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 32px;
        }
        p {
            color: #666;
            line-height: 1.5;
            margin-bottom: 10px;
            text-align: center;
        }
        h2 {
            color: #007bff;
            font-size: 48px;
            text-align: center;
            margin: 20px 0;
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Welcome to our website!</h1>
    <p>Please enter the following OTP to complete your login:</p>
    <h2>{{ $otp }}</h2>
    <p>This OTP is valid for 5 minutes only.</p>
    <p>If you did not request this login, please ignore this email.</p>
    <p>Thank you.</p>
</body>
</html>
