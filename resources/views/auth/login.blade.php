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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Sign In</title>
</head>

<body class="sign-up">
    <header>
        <ul class="list-nav">
            <a href="{{ route('signup') }}">
                <li>News user?</li>
                <li>Create an Account</li>
            </a>
            <li><a href="#"><i class="fa fa-ellipsis-h" aria-hidden="true"
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
                            Home To
                            Parks Shadows
                        </h1>
                        <p class="copyright">©Copyright 2023</p>
                    </div>

                </div>
                <div class="col col-6">
                    <h5>Sign In</h5>
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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p>Or sign in using your email address</p>
                                    <div class="inputted">
                                        <div class="email">
                                            <label for="email">Your Email:</label>
                                            <input type="email" placeholder="Tonynguyen@example.com" name="email"
                                                required>
                                        </div>
                                        <div class="password">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" required>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="remember-me">
                                        <input type="checkbox" name="remember">
                                        <label for="remember">Remember me</label>
                                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot
                                            Password?</a>
                                    </div>
                                    <button type="submit">Sign In</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="owner" role="tabpanel"
                                aria-labelledby="v-pills-pooblastila-tab">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p>Or sign in using your email address</p>
                                    <div class="inputted">
                                        <div class="email">
                                            <label for="email">Your Email:</label>
                                            <input type="email" id="email" placeholder="Tonynguyen@example.com"
                                                name="email" required>
                                        </div>
                                        <div class="password">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" required>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="remember-me">
                                        <input type="checkbox" id="remember" name="remember">
                                        <label for="remember">Remember me</label>
                                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot
                                            Password?</a>
                                    </div>
                                    <button type="submit">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card1">
                        <div class="card-body">
                        <div class="d-inline-flex align-items-start">
                          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-user-tab" data-bs-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="true">Podatki o uporabniku</a>
                            <a class="nav-link" id="v-pills-pooblastila-tab" data-bs-toggle="pill" href="#v-pills-pooblastila" role="tab" aria-controls="v-pills-pooblastila" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-prijave-tab" data-bs-toggle="pill" href="#v-pills-prijave" role="tab" aria-controls="v-pills-prijave" aria-selected="false">Prijave</a>
                          </div>
                          <div class="tab-content " id="v-pills-tabContent">
                            <div class="tab-pane fade show active " id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                              <form id="posodobi_uporabnika">
                              <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                              </div>
                            </form>
                            </div>
                            <div class="tab-pane fade" id="v-pills-pooblastila" role="tabpanel" aria-labelledby="v-pills-pooblastila-tab">Pooblastila</div>
                            <div class="tab-pane fade" id="v-pills-prijave" role="tabpanel" aria-labelledby="v-pills-prijave-tab">Prijave</div>
                          </div>
                        </div>
                        </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                          </div> -->
                </div>
            </div>
        </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<!-- AdminLTE App -->
<script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('/admin/plugins/toastr/toastr.min.js') }}"></script>
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
