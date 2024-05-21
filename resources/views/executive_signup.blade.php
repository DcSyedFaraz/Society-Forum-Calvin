<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <title>Executive Registration</title>
    <style>
        .is-valid {
            width: 441px;
        }

        .is-invalid {
            width: 27.6em;
        }

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
            right: 38%;
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
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .upload-button {
            color: #8e7b56;
            font-size: 1.2em;
        }

        .upload-button:hover {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
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

        .mb-3.checkkboxes {
            display: flex;
            justify-content: center;
            margin-left: -90px;
        }

        .card-body {
            overflow: overlay;
            height: 430px;
        }

        .card-body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #f5f5f5;
        }

        .card-body::-webkit-scrollbar {
            width: 12px;
            background-color: #f5f5f5;
        }

        .card-body::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
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
            <li><a href="#">New User?</a></li>
            <li><a href="#">Create an Account</a></li>
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"
                        style="font-size:20px;color:black;"></i>
                </a>
            </li>
        </ul>
    </header>
    <section>
        <div class="container-fluid sgin-bg">
            <div class="row">
                <div class="col col-lg-6 col-sm-12 welcome">
                    <div class="contently">
                        <h1>Welcome Executive Members</h1>
                        <p class="copyright">© Copyright {{ \Carbon\Carbon::now()->year }}</p>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="profile-info">
                            <div class="circle">
                                <img class="profile-pic"
                                    src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" />
                                <div class="p-image">
                                    <i class="fa fa-camera upload-button"></i>
                                </div>
                            </div>
                            <div class="createheading">
                                <h2>Executive Registration</h2>
                                <h2>Create Your Account</h2>
                            </div>
                        </div>
                    </div>
                    <div class="formss">
                        <div class="card-body">
                            <form action="{{ route('executive_registration') }}" method="POST" id="form"
                                enctype="multipart/form-data">
                                @csrf
                                <input class="file-upload" name="image" type="file" accept="image/*" />
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Legal Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Tony Nguyen" />
                                </div>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">User Name</label>
                                    <div class="nedwssd">

                                        <input type="text" class="form-control" name="username" maxlength="10"
                                            placeholder="TonyNguyen01" required pattern="[a-zA-Z0-9]{1,10}">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">User Name must not contain spaces and must not
                                            exceed 10 characters.</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Full Current Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" />
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phoneNumber"
                                        placeholder="+1 3934 3445 33" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="tony@example.com" />
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
                                <div class="mb-3">
                                    <label for="parkaddress" class="form-label">Park Shadows HOA Address</label>
                                    <input type="text" class="form-control" name="parkaddress"
                                        placeholder="---" />
                                </div>
                                <div class="mb-3 checkkboxes">
                                    <input type="checkbox" class="custom-control-input" name="customCheck1" />
                                    <label class="custom-control-label" for="customCheck1">Check if it is same</label>
                                </div>
                                <div class="mb-3">
                                    <label for="hoaaddress" class="form-label">Address if Not Same as HOA
                                        Address</label>
                                    <input type="text" class="form-control" name="hoaaddress"
                                        placeholder="---" />
                                </div>
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation"
                                        placeholder="---" />
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Create an account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="assets/js/scripity.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        // Add event listener to input element with name "username"
        $('input[name="username"]').on('keyup', function() {
            // Validate the "username" field
            $('#form').bootstrapValidator('validateField', 'username');

            // Add or remove classes based on validation result
            if ($(this).val().length > 0 && $(this).val().match(/^[a-zA-Z0-9]{1,10}$/)) {
                $(this).removeClass('is-invalid').addClass('is-valid');
            } else {
                $(this).removeClass('is-valid').addClass('is-invalid');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var checkbox = $('input[name="customCheck1"]');
        var hoaAddress = $('input[name="hoaaddress"]');

        checkbox.change(function() {
            if (checkbox.is(':checked')) {
                hoaAddress.prop('disabled', true).val(null);
            } else {
                hoaAddress.prop('disabled', false);
            }
        });
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(".profile-pic").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

        $(".file-upload").on("change", function() {
            readURL(this);
        });

        $(".upload-button").on("click", function() {
            $(".file-upload").click();
        });
    });
</script>
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (session('error'))
        toastr.error("{{ session('error') }}")
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

</html>
