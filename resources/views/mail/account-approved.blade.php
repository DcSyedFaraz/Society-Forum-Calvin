<!-- resources/views/emails/account-approved.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Approved</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Account Approved</h1>
        </div>

        <p>Dear {{ $name }},</p>

        <p>We are pleased to inform you that your account request has been approved! You can now access your dashboard
            by clicking the link below and logging in with your details:</p>

        <p style="text-align: center;">
            <a href="{{ $loginUrl }}" class="button">Login to Your Dashboard</a>
        </p>

        <p>If you have any issues accessing your account, feel free to reach out.</p>

        <p>Best regards,<br>
            Support Team</p>

        <div class="footer">
            <p>This is an automated message. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>

</html>
