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
    <title>Forget Password</title>
    <style>
        a.goback {
            margin-top: 60px !important;
            position: absolute;
        }
    </style>
</head>

<body class="sign-up">
    <header>
        <ul class="list-nav">
            <a href="{{ route('signup') }}">
                <li>News user?</li>
                <li>Create an Account</li>
            </a>
            <li><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"
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
                        <p class="copyright">©Copyright {{ \Carbon\Carbon::now()->year }}</p>
                    </div>

                </div>
                <div class="col col-6">
                    <h5>Forget Password ?</h5>
                    <div class="formss">
                        <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                            <div class="tab-pane fade show active " id="rental" role="tabpanel"
                                aria-labelledby="v-pills-user-tab">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <p>Enter the email address you used when you joined and we'll send you instructions
                                        to reset your password.</p>
                                    <div class="inputted">
                                        <div class="email col-12">
                                            <label for="email">Your Email:</label>
                                            <input type="email" id="email" placeholder="Tonynguyen@example.com"
                                                name="email" required>
                                        </div>
                                    </div>

                                    <button type="submit">Submit</button>
                                </form>
                                <a href="{{ route('login') }}" class="goback">
                                    < Back to sign in</a>
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
{{-- <script src="assets/js/scripity.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
