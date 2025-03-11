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
    <title>OTP</title>
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

        .card {
            background-color: #FFFFFF;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }

        .card-header {
            border-bottom: none;
        }

        .card-title {
            font-size: 28px;
            font-weight: 700;
            color: #333333;
            text-transform: capitalize;
            margin-bottom: 30px;
        }

        .form-control {
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            line-height: 25px;
            color: #333333;
            width: 100%;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            padding: 10px 30px;
            font-size: 18px;
            line-height: 25px;
            color: #FFFFFF;
            text-transform: capitalize;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>

<body class="thankyou">
    <section class="login-main-wrapper">
        <div class="main-container">
            <div class="login-process">
                <div class="login-main-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Two step identification. Please check your email for One
                                            time password. Also check your Spam and Junk Mail folders.</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('otp.verify') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" name="otp" class="form-control"
                                                    id="inputGroupFile01" placeholder="Enter OTP">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
