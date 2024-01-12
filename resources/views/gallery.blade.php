<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="{{asset('frontend/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Calvin Robinson</title>
</head>

<body>
    <header class="header">
            <div class="col-md-3">
                <img src="{{asset('frontend/images/logo.png') }}">
            </div>
            <div class="col-md-6">
                <ul class="ul-menu">
                    <a href="/">
                        <li class="active">Home</li>
                    </a>
                    <a href="{{ route('about_us') }}">
                        <li>About us</li>
                    </a>
                    <a href="{{ route('gallery') }}">
                        <li>Gallery</li>
                    </a>
                    <a href="{{ route('community_forum') }}">
                        <li>Community Forum</li>
                    </a>
                </ul>
            </div>
        <div class="col-md-3" style="text-align: end;">
            <a href="{{ route('contact') }}"><button class="btn-1">Contact Us</button></a>
        </div>
    </header>

    <body>
        <section class="container-fluid-banner">
            <div class="col-12">
                <h1 class="h1-about">Gallery</h1>
                <hr class="devider">
            </div>
        </section>
        <section class="main-div2">
            <div class="col-12">
                <h1 class="gallery">Our Recent Gallery</h1>
                <div class="grid-wrapper">
                    <div>
                        <img src=" {{asset('frontend/images/gallery1.png') }}" alt="" />
                    </div>
                    <div>
                        <img src=" {{asset('frontend/images/gallery2.png') }}" alt="" />
                    </div>
                    <div class="tall">
                        <img src=" {{asset('frontend/images/gallery3.png') }}" alt="">
                    </div>
                    <div class="wide">
                        <img src=" {{asset('frontend/images/gallery4.png') }}" alt="" />
                    </div>
                    <div>
                        <img src=" {{asset('frontend/images/gallery5.png') }}" alt="" />
                    </div>
                    <div class="tall">
                        <img src=" {{asset('frontend/images/gallery6.png') }}" alt="" />
                    </div>
                    <div class="big">
                        <img src=" {{asset('frontend/images/gallery7.png') }}" alt="" />
                    </div>
                    <div>
                        <img src=" {{asset('frontend/images/gallery8.png') }}" alt="" />
                    </div>
                    <div class="tall">
                        <img src=" {{asset('frontend/images/gallery11.png') }}" alt="" />
                    </div>
                    <div>
                        <img src=" {{asset('frontend/images/gallery6.png') }}" alt="" />
                    </div>
                    <div>
                        <img src=" {{asset('frontend/images/gallery6.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid-banner">
            <div class="col-12">
                <div class="cta">
                    <h1 class="h1-about">Get In Touch With Us</h1>
                    <hr class="devider">
                    <a href="contact.html"><button class="btn-2">Contact Us</button></a>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="footer-inner">
                <div class="col-md-3">
                    <img src=" {{asset('frontend/images/footer-logo.png" class="footer-logo" alt="">
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
                        <a href="index.html" class="footer-a">
                            <li class="footer-li">Home</li>
                        </a>
                        <a href="about.html" class="footer-a">
                            <li class="footer-li">About Us</li>
                        </a>
                        <a href="gallery.html" class="footer-a">
                            <li class="footer-li">Gallery</li>
                        </a>
                        <a href="contact.html" class="footer-a">
                            <li class="footer-li">Contact Us</li>
                        </a>
                        <a href="community-forum.html" class="footer-a">
                            <li class="footer-li">Community Forum</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2 class="footer-hed">Our Services</h2>
                    <ul class="footer-ul">
                        <a href="index.html" class="footer-a">
                            <li class="footer-li">Home</li>
                        </a>
                        <a href="about.html" class="footer-a">
                            <li class="footer-li">About Us</li>
                        </a>
                        <a href="gallery.html" class="footer-a">
                            <li class="footer-li">Gallery</li>
                        </a>
                        <a href="contact.html" class="footer-a">
                            <li class="footer-li">Contact Us</li>
                        </a>
                        <a href="community-forum.html" class="footer-a">
                            <li class="footer-li">Community Forum</li>
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
                <p class="copy">ALLRIGHT RESERVED - CALVIN ROBINSON 2023</p>
            </div>
        </footer>
    </body>