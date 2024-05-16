<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (request()->routeIs('realstate'))
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;800;900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @endif
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {

            var swiper = new Swiper('.carousel-gallery .swiper-container', {
                effect: 'slide',
                speed: 900,
                slidesPerView: 1,
                spaceBetween: 20,
                simulateTouch: true,
                autoplay: {
                    delay: 5000,
                    stopOnLastSlide: false,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.carousel-gallery .swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    // when window width is <= 320px
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    // when window width is <= 480px
                    425: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    // when window width is <= 640px
                    768: {
                        slidesPerView: 1,
                        spaceBetween: 20
                    }
                }
            }); /*http://idangero.us/swiper/api/*/



        });
    </script>
    <title>Park Shadows HOA</title>
</head>


<body>
    <div class="desktop">
        <header class="header">
            <div class="container">
                <div class="row">
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
                        </ul>
                    </div>
                    <div class="col-md-3" style="text-align: end;">
                        <a href="{{ route('contact') }}"><button class="btn-1">Contact Us</button></a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!--////////////////////////////-->
    <div class="mobile">
        <div class="container">
            <div class="row px-3">
                <div class="col-6">
                    <a href="/" class=""><img src="{{ asset('frontend/images/logo.png') }}"></a>
                </div>


                <div class="col-6">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container">
                            <button class="navbar-toggler" style="margin-right:5px !important;" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse top_nav" id="navbarSupportedContent">
                                <ul class="navbar-nav mx-auto ">
                                    <a href="/">
                                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</li>
                                    </a>
                                    <a href="{{ route('realstate') }}">
                                        <li class="{{ request()->routeIs('realstate') ? 'active' : '' }}">Real Estate
                                        </li>
                                    </a>
                                    <a href="{{ route('gallery') }}">
                                        <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</li>
                                    </a>
                                    <a href="{{ route('about_us') }}">
                                        <li class="{{ request()->routeIs('about_us') ? 'active' : '' }}">About us</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <body>

        @yield('content')
        <footer class="footer">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-md-3">
                        <img src=" {{ asset('frontend/images/footer-logo.png') }}" class="footer-logo"
                            alt="alt">
                        <p class="footer-text">We promote home ownership and community engagement. Become part of our
                            thriving community today!</p>
                        <strong style="text-transform: uppercase; color: white; margin-bottom: 15px !important;">* We
                            never
                            spam
                            your email</strong>
                        <form class="form-subscribe" action="#">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Your email address">
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
                            {{-- <a class="footer-a" href="{{ route('cookie_policy') }}">
                            <li class="footer-li">Cookie policy</li>
                        </a>
                        <a class="footer-a" href="{{ route('guidelines') }}">
                            <li class="footer-li">Guidelines</li>
                        </a>
                        <a class="footer-a" href="{{ route('agreement') }}">
                            <li class="footer-li">Agreement</li>
                        </a> --}}
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-hed">Our Policies</h2>
                        <ul class="footer-ul">
                            <a class="footer-a" href="{{ route('cookie_policy') }}">
                                <li class="footer-li">Cookie policy</li>
                            </a>
                            {{-- <a class="footer-a" href="{{ route('guidelines') }}">
                            <li class="footer-li">Guidelines</li>
                        </a> --}}
                            <a class="footer-a" href="{{ route('agreement') }}">
                                <li class="footer-li">E.U.L.A</li>
                            </a>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-had">Location</h2>
                        <p class="footer-text">2325 Mark Avenue, Palmdale, <br>CA 93550</p>
                        <br>
                        <p class="footer-text">Bartlein and Company, Inc. </p>
                        <p class="footer-text">Valencia, CA 91355<br>25031 W. Avenue Stanford</p>
                        <p class="footer-text">(661) 257-1570</p>
                        {{-- <h2 class="footer-had">Office Hours</h2>
                    <p class="footer-text">9:00 am to 6:00 pm </p> --}}
                        <a class="footer-a " target="_blank"
                            href="https://www.facebook.com/profile.php?id=61559086599861">
                            <i class="fab fa-facebook h2 mt-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p class="copy text-uppercase">All rights reserved - park shadows hoa
                    {{ \Carbon\Carbon::now()->year }} Designed and Developed By <a
                        href="https://digitalneststudio.com/">Digital Nest Studio.</a>
                </p>
                </p>
            </div>
        </footer>
        <script>
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
            @if (session('error'))
                toastr.error("{{ session('error') }}")
            @endif
            @if (session('warning'))
                toastr.warning("{{ session('warning') }}")
            @endif
            @if (session('info'))
                toastr.info("{{ session('info') }}")
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}")
                @endforeach
            @endif

            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </body>
