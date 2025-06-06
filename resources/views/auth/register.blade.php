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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- reCAPTCHA --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Create Account</title>
    <style>
        .valid input.form-control {
            width: 27.6em !important;
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
            width: 200px;
            max-height: 200px;
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
            margin-top: -40px;
            right: 38%;
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
            <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"
                        style="font-size:20px;color:black;"></i>
                </a></li>
        </ul>
    </header>
    <section>
        <div class="container-fluid sgin-bg">
            <div class="row">
                <div class="col col-lg-6 col-sm-12 welcome">
                    <div class="contently">
                        <h1>Welcome
                            Home To
                            Parks Shadows
                        </h1>
                        <p class="copyright">© Copyright {{ \Carbon\Carbon::now()->year }}</p>
                    </div>

                </div>
                <div class="col col-lg-6 col-sm-12">
                    <div class="row">
                        <div class="profile-info">
                            <div class="circle">
                                <img class="profile-pic"
                                    src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">
                                <div class="p-image">
                                    <i class="fa fa-camera upload-button"></i>
                                    <input name="image" class="file-upload" type="file" accept="image/*" />
                                </div>
                            </div>
                            <div class="createheading">
                                <h2>Create Your Account</h2>
                            </div>

                        </div>
                    </div>
                    <div class="formss">
                        <div class="nav flex-row nav-pills me-3" id="forn-tabs" role="tablist"
                            aria-orientation="horizontal">
                            <a class="nav-link active" id="v-pills-user-tab" data-bs-toggle="pill" href="#rental"
                                role="tab" aria-controls="v-pills-user" aria-selected="true">Rental</a>
                            <a class="nav-link" id="v-pills-pooblastila-tab" data-bs-toggle="pill" href="#owner"
                                role="tab" aria-controls="v-pills-pooblastila" aria-selected="false">Owner</a>
                        </div>
                        <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                            <div class="tab-pane fade show active " id="rental" role="tabpanel"
                                aria-labelledby="v-pills-user-tab">
                                <div class="card-body">
                                    <form method="post" action="{{ route('registeration') }}" class=""
                                        id="owner-form">
                                        @csrf
                                        <input type="hidden" value="rent" name="position">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name <span
                                                    class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Tony Nguyen">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">User Name <span
                                                    class="text-danger">*</span> </label>
                                            <div class="valid">
                                                <input type="text" class="form-control" name="username"
                                                    maxlength="15" placeholder="TonyNguyen01" required
                                                    >
                                                <div class="username-feedback invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address <span
                                                    class="text-danger">*</span> </label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="tony@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Password <span
                                                    class="text-danger">*</span> </label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="*****" />
                                            <div class="password-feedback invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Confirm Password <span
                                                    class="text-danger">*</span> </label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                placeholder="*****" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Phone Number <span
                                                    class="text-danger">*</span> </label>
                                            <input type="tel" class="form-control" name="phone"
                                                placeholder="+1 3934 3445 33">
                                        </div>
                                        <div class="landlordersect">
                                            <h4 style="width: 100%; display: block !important; margin-bottom: 20px;">
                                                Landlord Complete Information</h4>
                                            <div class="landlorder">
                                                <div class="mb-3">
                                                    <label for="landlord" class="form-label">Name <span
                                                            class="text-danger">*</span> </label>
                                                    <input type="text" name="landlord_name" name="name"
                                                        class="form-control" id="landname"
                                                        placeholder="Tony Nguyen">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="addPhone" class="form-label">Phone Number <span
                                                            class="text-danger">*</span> </label>
                                                    <input type="tel" name="landlord_phone_number"
                                                        class="form-control" id="landPhone"
                                                        placeholder="+13333 2222 55">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mobile" class="form-label">Landlord's email <span
                                                            class="text-danger">*</span> </label>
                                                    <input type="email" name="landlord_email_address"
                                                        class="form-control" id="landemail"
                                                        placeholder="Tonynguyen@example.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Landlord's address <span
                                                            class="text-danger">*</span> </label>
                                                    <input type="text" name="landlord_address"
                                                        class="form-control" id="landaddress"
                                                        placeholder="Address of Current Property">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="currentaddress" class="form-label">Address of Current
                                                Property <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Address">
                                        </div>
                                        @if (!app()->environment('pc'))
                                            <div class="g-recaptcha"
                                                data-sitekey="6Ld1j4oqAAAAAEVkLOgstLWbpOOw8OjpOUhEJrUc">
                                            </div>
                                        @endif

                                        <button type="submit" class="btn btn-primary">Create an account</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="owner" role="tabpanel"
                                aria-labelledby="v-pills-pooblastila-tab">
                                <div class="card-body">
                                    <form method="post" action="{{ route('registeration') }}" id="rental-form">
                                        @csrf
                                        <input type="hidden" value="owner" name="position">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name <span
                                                    class="text-danger">*</span> </label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Tony Nguyen">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">User Name <span
                                                    class="text-danger">*</span> </label>
                                            <div class="valid">
                                                <input type="text" class="form-control" name="username"
                                                    maxlength="15" placeholder="TonyNguyen01" required
                                                    >
                                                <div class="username-feedback invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address <span
                                                    class="text-danger">*</span> </label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="tony@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Password <span
                                                    class="text-danger">*</span> </label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="*****" />
                                            <div class="password-feedback invalid-feedback"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Confirm Password <span
                                                    class="text-danger">*</span> </label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                placeholder="*****" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Phone Number <span
                                                    class="text-danger">*</span> </label>
                                            <input type="tel" class="form-control" name="phone"
                                                id="phoneNumber" placeholder="+1 3934 3445 33">
                                        </div>
                                        <div class="mb-3">
                                            <label for="startDate">Date of Purchase of Property <span
                                                    class="text-danger">*</span> </label>
                                            <input id="startDate" name="date" class="form-control"
                                                type="date" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="currentaddress" class="form-label">Mailing Address<span
                                                    class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="currentaddress" class="form-label">Park Shadows Property
                                                Address<span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="park_address"
                                                placeholder="Park Shadows Property
                                                Address">
                                        </div>
                                        @if (!app()->environment('pc'))
                                            <div class="g-recaptcha"
                                                data-sitekey="6Ld1j4oqAAAAAEVkLOgstLWbpOOw8OjpOUhEJrUc">
                                            </div>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Create an account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/css/bootstrapValidator.min.css" />
<script type="text/javascript"
    src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        // Add password strength validation
        function validatePassword(password) {
            const minLength = 8;
            const hasUpperCase = /[A-Z]/.test(password);
            const hasLowerCase = /[a-z]/.test(password);
            const hasNumbers = /\d/.test(password);
            const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);

            return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumbers && hasSpecialChar;
        }

        // Enhanced username validation
        $('input[name="username"]').on('keyup', function() {
            const username = $(this).val();
            const isValid = /^[a-zA-Z0-9]{1,15}$/.test(username);

            if (username.length === 0) {
                $(this).removeClass('is-valid is-invalid');
                $('.username-feedback').text('Username is required');
            } else if (!isValid) {
                $(this).removeClass('is-valid').addClass('is-invalid');
                $('.username-feedback').text(
                    'Username must be 1-15 characters and contain only letters and numbers');
            } else {
                $(this).removeClass('is-invalid').addClass('is-valid');
                $('.username-feedback').text('Username is valid');
            }
        });

        // Password validation
        $('input[name="password"]').on('keyup', function() {
            const password = $(this).val();
            const isValid = validatePassword(password);

            if (password.length === 0) {
                $(this).removeClass('is-valid is-invalid');
                $('.password-feedback').text('Password is required');
            } else if (!isValid) {
                $(this).removeClass('is-valid').addClass('is-invalid');
                $('.password-feedback').html(
                    'Password must:<br>- Be at least 8 characters<br>- Include uppercase and lowercase letters<br>- Include numbers<br>- Include special characters'
                    );
            } else {
                $(this).removeClass('is-invalid').addClass('is-valid');
                $('.password-feedback').text('Password is strong');
            }
        });

        // Image upload validation
        $(".file-upload").on('change', function() {
            const file = this.files[0];
            const maxSize = 5 * 1024 * 1024; // 5MB
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (file) {
                if (!allowedTypes.includes(file.type)) {
                    toastr.error('Please upload only image files (JPEG, PNG, GIF)');
                    this.value = '';
                    return;
                }

                if (file.size > maxSize) {
                    toastr.error('File size must be less than 5MB');
                    this.value = '';
                    return;
                }

                readURL(this);
            }
        });

        // Enhanced form submission
        $('form[id^="owner-form"], form[id^="rental-form"]').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const formData = new FormData(this);

            // Validate password
            const password = form.find('input[name="password"]').val();
            if (!validatePassword(password)) {
                toastr.error('Please ensure your password meets all requirements');
                return;
            }

            // Add loading state
            submitBtn.prop('disabled', true).html(
            '<i class="fa fa-spinner fa-spin"></i> Processing...');

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        window.location.href = "{{ route('login') }}";
                    } else {
                        toastr.error(response.message);
                        submitBtn.prop('disabled', false).html('Create an account');
                    }
                },
                error: function(xhr, status, error) {
                    submitBtn.prop('disabled', false).html('Create an account');

                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(key => {
                            toastr.error(errors[key]);
                        });
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                },
                timeout: 10000 // 10 second timeout
            });
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
