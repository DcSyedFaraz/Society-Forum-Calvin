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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- reCAPTCHA --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Real Estate Sign In</title>
</head>

<body class="sign-up">
    <header>
        <ul class="list-nav">
            <li><a href="{{ route('estate_signup') }}">
            <li>New User?</li>
            <li>Create an Account</li>
            </a></li>
            <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"
                        style="font-size:20px;color:black;"></i>
                </a></li>
        </ul>
    </header>
    <section>
        <div class="container-fluid sgin-bg">
            <div class="row">
                <div class="col col-lg-6 col-sm-12 welcome">
                    <div style="width:80%;" class="contently">
                        <h1>Welcome
                            Real Estate
                            Agents
                        </h1>
                        <p class="copyright">©Copyright {{ \Carbon\Carbon::now()->year }}</p>
                    </div>

                </div>
                <div class="col col-lg-6 col-sm-12">
                    <h2>Real Estate</h2>
                    <h5>Sign In</h5>
                    <div class="divider"></div>
                    <p>Or sign in using your email address</p>
                    <div class="formss">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="inputted">
                                <div class="email">
                                    <label for="email">Your Email:</label>
                                    <input type="email" name="email" placeholder="Tonynguyen@example.com"
                                        name="email" required>
                                </div>
                                <div class="password">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" name="password" required>
                                </div>
                            </div>
                            <div class="remember-me">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                                @if (!app()->environment('pc'))
                                    <div class="g-recaptcha" data-sitekey="6Ld1j4oqAAAAAEVkLOgstLWbpOOw8OjpOUhEJrUc">
                                    </div>
                                @endif
                            </div>
                            <button type="submit">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>
<script src="{{ asset('assets/js/scripity.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
