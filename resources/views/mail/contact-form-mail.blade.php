<!DOCTYPE html>
<html>

<head>
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1rem;
            color: #333;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        strong {
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
        <p><strong>Message:</strong> {{ $data['message'] }}</p>
    </div>
</body>

</html>
