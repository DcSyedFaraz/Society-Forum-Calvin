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
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Real Estate Registration</title>
    <style>
        .profile-info {
            display: flex;
            flex-direction: row;
            margin-bottom: 50px;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .profile-pic {
            width: 100%;
            height: 100%;
            display: inline-block;
            box-shadow: 4px 23px 29px #695F9733;
            opacity: 1;
        }

        .file-upload {
            display: none;
        }

        .circle {
            border-radius: 100% !important;
            overflow: hidden;
            width: 128px;
            height: 125px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            /* position: absolute;
            top: 40px; */
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .p-image {
            position: absolute;
            right: 35%;
            margin-top: -20px;
            /* top: 35%; */
            color: #666666;
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
            background-color: #ffff;
            padding: 3px 6px;
            box-shadow: 2px 1px 10px #00000052;
            border-radius: 10px;
        }

        .p-image:hover {
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }

        .upload-button {
            color: #8E7B56;
            font-size: 1.2em;
        }

        .upload-button:hover {
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
            color: #999;
        }

        .formss .col {
            padding: 10px !important;
        }

        .mb-3 {
            display: flex;
            align-items: center;
        }

        .landlorder .mb-3 {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: stretch;
            align-content: center;
            flex-wrap: nowrap;
            text-align: left !important;
        }

        .card-body {
            overflow: overlay;
            height: 440px;
        }

        .mb-3 {
            display: flex;
            align-items: center;
            justify-content: space-around;
            align-content: stretch;
            flex-direction: row;
            gap: 10px;
        }

        .landlordersect {
            padding: 20px;
            border: 1px solid #8E7B56;
            border-radius: 30px;

            margin-bottom: 18px;
        }

        .landlorder {
            /* padding: 20px;
            border: 1px solid #8E7B56;
            border-radius: 30px; */
            display: grid;
            grid-template-columns: auto auto;
            gap: 10px;
            /* margin-bottom: 18px; */
        }

        .card-body {
            overflow: overlay;
            height: 430px;
        }

        .card-body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .card-body::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .card-body::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #8e7b56;
        }

        .form-label {
            margin-bottom: 0.5rem;
            width: 190px !important;
            font-size: 15px;
        }

        .btn-primary {
            color: #fff;
            background-color: #8e7b56;
            border-color: #8e7b56;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #000000;
            border-color: #000000;
        }

        body {
            overflow: hidden;
        }

        .formss .input-group-append {
            cursor: pointer;
        }

        .formss {
            width: 100%;
        }
    </style>
</head>

<body class="sign-up">
    <header>
        <ul class="list-nav">
            <li><a href="#">News user?</a></li>
            <li><a href="#">Create an Account</a></li>
            <li><a href="{{route('home')}}"><i class="fa fa-ellipsis-h" aria-hidden="true"
                        style="font-size:20px;color:black;"></i>
                </a></li>
        </ul>
    </header>
    <section>
        <div class="container-fluid sgin-bg">
            <div class="row">
                <div class="col col-6 welcome">
                    <div class="contently">
                        <h1>Welcome
                            Real Estate
                            Agents
                        </h1>
                        <p class="copyright">© Copyright 2024</p>
                    </div>

                </div>
                <div class="col col-6">
                    <form action="{{ route('agentregisteration') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="profile-info">
                                <div class="circle">
                                    <img class="profile-pic"
                                        src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">
                                    <div class="p-image">
                                        <i class="fa fa-camera upload-button"></i>

                                        <input class="file-upload" name="image" type="file" accept="image/*" />
                                    </div>
                                </div>
                                <div class="createheading">
                                    <h2>Real Estate Registration</h2>
                                    <h2>Create Your Account</h2>
                                </div>

                            </div>
                        </div>
                        <div class="formss">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">User Name</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="TonyNguyen01" />
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Real Estate Full Legal Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Tony Nguyen">
                                </div>
                                <div class="mb-3">
                                    <label for="licence" class="form-label">Real Estate Offical Licence Number</label>
                                    <input type="number" class="form-control" name="license"
                                        placeholder="000 1000 000">
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Real Estate Phone Number</label>
                                    <input type="tel" class="form-control" name="phoneNumber"
                                        placeholder="+1 3934 3445 33">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Real Estate Email Address</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="tony@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="*****" />
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        placeholder="*****" />
                                </div>
                                <div class="landlordersect">
                                    <h4 style="width: 100%; display: block !important; margin-bottom: 20px;">Real Estate
                                        Agent Company</h4>
                                    <div class="landlorder">
                                        <div class="mb-3">
                                            <label for="companyname" class="form-label">Real Estate Company Name</label>
                                            <input type="text" class="form-control" name="companyname"
                                                placeholder="Tony Nguyen">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyphone" class="form-label">Phone<br> Number</label>
                                            <input type="tel" class="form-control" name="companyphone"
                                                placeholder="+13333 2222 55">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companymailing" class="form-label">Real Estate Company Mailing
                                                Address</label>
                                            <input type="text" class="form-control" name="companymailadd"
                                                placeholder="Tonynguyen@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyemail" class="form-label">Real Estate Company Email
                                                Address</label>
                                            <input type="text" class="form-control" name="companyemail"
                                                placeholder="Tonynguyen@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyweb" class="form-label">Real Estate Company
                                                Website</label>
                                            <input type="url" class="form-control" name="companyweb"
                                                placeholder="www.example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyaddress" class="form-label">Real Estate Company
                                                Physical Address</label>
                                            <input type="text" class="form-control" name="landaddress"
                                                placeholder="Company Address">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Create an account</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
</script>
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @error('password')
        toastr.error("{{ $message }}")
    @enderror
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

</html>
