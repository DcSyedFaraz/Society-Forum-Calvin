<!-- resources/views/emails/account-rejected.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Account Request Not Approved</title>
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
            background-color: #f44336;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .reason {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 10px 15px;
            margin: 20px 0;
        }

        .button {
            background-color: #2196F3;
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
            <h1>Account Request Not Approved</h1>
        </div>

        <p>Dear {{ $name }},</p>

        <p>We regret to inform you that your account request has been rejected due to the following reason:</p>

        <div class="reason">
            <p><strong>⚠ {{ $reason }}</strong></p>
        </div>

        <p>To proceed, please submit a new application with the correct information. Once resubmitted, we will review
            your request again.</p>

        <p style="text-align: center;">
            <a href="{{ $applicationUrl }}" class="button">Submit New Application</a>
        </p>

        <p>If you have any questions or need clarification about the rejection reason, please don't hesitate to contact
            our support team.</p>

        <p>Best regards,<br>
            Your Support Team</p>

        <div class="footer">
            <p>This is an automated message. Please do not reply directly to this email.</p>
        </div>
    </div>
</body>

</html>
