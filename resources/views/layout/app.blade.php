<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    @if (request()->routeIs('realstate'))
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;800;900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @endif
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
    <title>Calvin Robinson</title>
</head>


<body>
    <header class="header">
        <div class="col-md-3">
            <a href="/" class=""><img src="{{ asset('frontend/images/logo.png') }}"></a>
        </div>
        <div class="col-md-6">
            <ul class="ul-menu">
                <a href="/">
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</li>
                </a>
                <a href="{{ route('realstate') }}">
                    <li class="{{ request()->routeIs('realstate') ? 'active' : '' }}">Real Estate</li>
                </a>
                <a href="{{ route('gallery') }}">
                    <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</li>
                </a>
                <a href="{{ route('about_us') }}">
                    <li class="{{ request()->routeIs('about_us') ? 'active' : '' }}">About us</li>
                </a>

                <!--<a href="{{ route('community_forum') }}">-->
                <!--    <li>Community Forum</li>-->
                <!--</a>-->
            </ul>
        </div>
        <div class="col-md-3" style="text-align: end;">
            <a href="{{ route('contact') }}"><button class="btn-1">Contact Us</button></a>
        </div>
    </header>

    <body>

        @yield('content')
        <footer class="footer">
            <div class="footer-inner">
                <div class="col-md-3">
                    <img src=" {{ asset('frontend/images/footer-logo.png') }}" class="footer-logo" alt="alt">
                    <p class="footer-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut elit tellus,
                        luctus
                        nec
                        ullamcorper ma</p>
                    <strong style="text-transform: uppercase; color: white; margin-bottom: 15px !important;">* We never
                        spam
                        your email</strong>
                    <form class="form-subscribe" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" placeholder="Your eamil address">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-envelope"
                                        aria-hidden="true"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <h2 class="footer-hed">Quick Links</h2>
                    <ul class="footer-ul">
                        <a class="footer-a" href="/">
                            <li class="footer-li">Home</li>
                        </a>
                        <a class="footer-a" href="{{ route('realstate') }}">
                            <li class="footer-li">Real Estate</li>
                        </a>
                        <a class="footer-a" href="{{ route('gallery') }}">
                            <li class="footer-li">Gallery</li>
                        </a>
                        <a class="footer-a" href="{{ route('about_us') }}">
                            <li class="footer-li">About us</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2 class="footer-hed">Our Services</h2>
                    <ul class="footer-ul">
                        <a class="footer-a" href="/">
                            <li class="footer-li">Home</li>
                        </a>
                        <a class="footer-a" href="{{ route('realstate') }}">
                            <li class="footer-li">Real Estate</li>
                        </a>
                        <a class="footer-a" href="{{ route('gallery') }}">
                            <li class="footer-li">Gallery</li>
                        </a>
                        <a class="footer-a" href="{{ route('about_us') }}">
                            <li class="footer-li">About us</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2 class="footer-had">Loaction</h2>
                    <p class="footer-text">2325 Mark Avenue, Palmdale, <br>CA 93550</p>
                    <h2 class="footer-had">Office Hours</h2>
                    <p class="footer-text">2325 Mark Avenue, Palmdale, <br>CA 93550</p>
                </div>
            </div>
            <div class="copyright">
                <p class="copy text-uppercase">ALLRIGHT RESERVED - park shadowshoa {{ \Carbon\Carbon::now()->year }}
                </p>
            </div>
        </footer>
    </body>
