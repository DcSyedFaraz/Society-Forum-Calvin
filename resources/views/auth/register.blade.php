<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calvin | Sign Up</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}"> --}}
    <!-- Toastr -->
    {{-- <link rel="stylesheet" href="{{ asset('/admin/plugins/toastr/toastr.min.css') }}"> --}}
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="hold-transition login-page">
    <div class="login-box my-5">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <!-- Your logo or title goes here -->
            </div>

            <div class="container w-50">
                <div class="col-md-8">
                    <ul class="nav nav-pills justify-content-end mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Owner</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Tenant</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="container">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <form method="post" action="{{ route('registeration') }}">
                                            @csrf
                                            <input type="hidden" value="owner" name="position">
                                            <div class="row">
                                                <div class="mb-3"> <label for="purchaseDate" class="form-label">Date
                                                        of Purchase of Property</label> <input name="date"
                                                        type="date" class="form-control" id="purchaseDate"> </div>

                                                <div class="mb-3"> <label for="propertyAddress"
                                                        class="form-label">Property Address</label> <input
                                                        name="address" type="text" class="form-control"
                                                        id="propertyAddress">
                                                </div>

                                                <div class="mb-3"> <label for="fullLegalName" class="form-label">Full
                                                        Legal Name</label> <input name="name" type="text"
                                                        class="form-control" id="fullLegalName">
                                                </div>

                                                <div class="mb-3"> <label for="phoneNumber" class="form-label">Phone
                                                        Number</label> <input name="phone" type="tel"
                                                        class="form-control" id="phoneNumber"> </div>

                                                <div class="mb-3"> <label for="emailAddress" class="form-label">Email
                                                        Address</label> <input name="email" type="email"
                                                        class="form-control" id="emailAddress"> </div>

                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <strong>Password:</strong>
                                                        <input
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            type="password" name="password" required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <strong>Confirm Password:</strong>
                                                        <input class="form-control" type="password"
                                                            name="confirm-password" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 form-check"> <input type="checkbox"
                                                        name="permission" class="form-check-input" id="permission">
                                                    <label class="form-check-label" for="permission">I give the HOA
                                                        permission to use my images for official purposes, such as
                                                        website development or community events.</label>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <form method="post" action="{{ route('registeration') }}" class="">
                                            @csrf
                                            <input type="hidden" value="rent" name="position">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="il-address" class="form-label">Current
                                                        Address:</label>
                                                    <input type="text" class="form-control" id="il-address"
                                                        name="address">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name:</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phone-number" class="form-label">Phone Number:</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        name="phone">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email-address" class="form-label">Email
                                                        Address:</label>
                                                    <input type="text" class="form-control" id="email-address"
                                                        name="email">
                                                </div>



                                                <div class="mb-3">
                                                    <label for="landlord-address" class="form-label">Landlord Address
                                                        of Current Property:</label>
                                                    <input type="text" class="form-control" id="landlord-address"
                                                        name="landlord_address">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="landlord-name" class="form-label">Landlord Full Legal
                                                        Name:</label>
                                                    <input type="text" class="form-control" id="landlord_name"
                                                        name="landlord_name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="landlord-phone-number" class="form-label">Landlord
                                                        Phone Number:</label>
                                                    <input type="text" class="form-control"
                                                        id="landlord-phone-number" name="landlord_phone_number">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="landlord-email-address" class="form-label">Landlord
                                                        Email Address:</label>
                                                    <input type="text" class="form-control"
                                                        id="landlord-email-address" name="landlord_email_address">
                                                </div>

                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <strong>Password:</strong>
                                                        <input
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            type="password" name="password" required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <strong>Confirm Password:</strong>
                                                        <input class="form-control" type="password"
                                                            name="confirm-password" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 form-check"> <input type="checkbox"
                                                        name="permission" class="form-check-input" id="permission">
                                                    <label class="form-check-label" for="permission">I give the HOA
                                                        permission to use my images for official purposes, such as
                                                        website development or community events.</label>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('login') }}" class="text-center">Sign in</a>
        <p class="mb-0"></p>
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Your additional scripts go here -->
    <!-- jQuery -->
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script> --}}
    <!-- Toastr -->
    {{-- <script src="{{ asset('/admin/plugins/toastr/toastr.min.js') }}"></script> --}}

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
</body>

</html>
