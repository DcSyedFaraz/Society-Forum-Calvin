<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <title>Thank You</title>
    <style>
        body.thankyou {
            background: url(../assets/imges/bg-thankyou.png);
            background-size: cover;
            background-position: center;
        }

        .thankyou-wrapper {
            width: 100%;
            height: 100vh;
            margin: auto;
            padding: 10px 0px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .thankyou-wrapper h1 {
            text-align: center;
            font: normal normal 800 70px / 80px Montserrat;
            letter-spacing: -0.92px;
            color: #FFFFFF;
            text-transform: capitalize;
            opacity: 1;
        }

        .thankyou-wrapper p {
            text-align: center;
            font: normal normal 600 25px/35px Montserrat;
            text-transform: inherit;
            letter-spacing: -0.34px;
            color: #FFFFFF;

            opacity: 1;
        }
    </style>
</head>

<body class="thankyou">
    <section class="login-main-wrapper">
        <div class="main-container">
            <div class="login-process">
                <div class="login-main-container">
                    <div class="thankyou-wrapper">
                        <h1>Thank You For Your Patience</h1>
                        <p>Your request for access to the dashboard is under review. You will be contacted soon.</p>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
