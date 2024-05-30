<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calvin | Sign Up</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="hold-transition login-page">
    <div class="login-box my-5">
        <div class="container w-50">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form method="post" action="{{ route('agentregisteration') }}">
                            @csrf
                            <!-- Business Information -->
                            <div class="mb-3">
                                <label for="business-name" class="form-label">Full Legal Name:</label>
                                <input type="text" class="form-control" id="business-name" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="business-address" class="form-label">Official License #:</label>
                                <input type="number" class="form-control" id="business-address" name="license">
                            </div>

                            <div class="mb-3">
                                <label for="mailing-address" class="form-label">Phone #:</label>
                                <input type="tel" class="form-control" id="mailing-address" name="phone">
                            </div>

                            <div class="mb-3">
                                <label for="business-phone" class="form-label">Email Address:</label>
                                <input type="email" class="form-control" id="business-phone" name="email">
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

                            <div class="mb-3">
                                <label for="business-email" class="form-label">Company's Name:</label>
                                <input type="text" class="form-control" id="business-email" name="company_name">
                            </div>

                            <div class="mb-3">
                                <label for="business-website" class="form-label">Company's Physical Address:</label>
                                <input type="text" class="form-control" id="business-website" name="physical_address">
                            </div>

                            <!-- License Information -->
                            <div class="mb-3">
                                <label for="license-name" class="form-label">Company's Mailing Address:</label>
                                <input type="text" class="form-control" id="license-name" name="company_mailing_address">
                            </div>

                            <div class="mb-3">
                                <label for="license-number" class="form-label">Company's Phone Number:</label>
                                <input type="tel" class="form-control" id="license-number" name="company_phone_number">
                            </div>

                            <div class="mb-3">
                                <label for="license-email" class="form-label">Company's Email Address:</label>
                                <input type="email" class="form-control" id="license-email" name="company_email">
                            </div>

                            <div class="mb-3">
                                <label for="agents-company" class="form-label">Company's Website:</label>
                                <input type="text" class="form-control" id="agents-company" name="company_website">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
