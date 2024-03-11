<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/min.js') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Calvin Robinson</title>
</head>

<body>
    <header class="header">
        <div class="col-md-3">
            <img src="{{ asset('frontend/images/logo.png') }}">
        </div>
        <div class="col-md-6">
            <ul class="ul-menu">
                <a href="/">
                    <li class="active">Home</li>
                </a>
                <a href="{{ route('realstate') }}">
                    <li>Real Estate</li>
                </a>
                <a href="{{ route('gallery') }}">
                    <li>Gallery</li>
                </a>
                <a href="{{ route('about_us') }}">
                    <li>About us</li>
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
    <section class="container-fluid">
        <div class="banner-inner">
            <h1 class="title">welcome to park <br>shadows HOA</h1>
            <img src="images/lines.png" class="line">
            <div class="buttons">
                <a href="{{ route('login') }}"><button class="btn-b">Member Login</button></a>
                <a href="{{ route('estate_login') }}"><button class="btn-b">Real Estate Login</button></a>
                <a href="{{ route('executive_login') }}"><button class="btn-b">Executive Login</button></a>
            </div>
        </div>
    </section>
    <section class="main-div">
        <div class="col-6">
            <h1 class="heading1">About Us</h1>
            <img src="{{ asset('frontend/images/circle.png') }}" class="circle">
            <p class="paragraph">The Park Shadows Homeowners Association is a non-profit mutual benefit corporation
                under IRC Section 501(c)(4) Homeowners’ Associations and applicable California regulations. We are
                located between East Avenue R-4 to the north and East Avenue R-8 to the South in Palmdale, California.
                Our main entrances are through the intersections of East Avenue R-4 and Cardiff Street and East Avenue
                R-8 and Laderman Lane. The Laderman Lane entrance is considered our main entrance. We promote a
                welcoming community and home ownership. We welcome you to buy here and live here. Our goal is to
                increase home values for the benefit of all our neighbors</p>
            <a href="#"><button class="btn-1">Learn More</button></a>
        </div>
        <div class="col-6">
            <img src="{{ asset('frontend/images/about.png') }}" style="width: 95%;">
        </div>
    </section>
    <section class="main-div1">
        <div class="col-5">
            <img src="{{ asset('frontend/images/dot.png') }}" class="dot">
            <img src="{{ asset('frontend/images/image2.png') }}"
                style="width: 100%; z-index: 000000; position: relative;">
        </div>
        <div class="col-7">
            <h1 class="heading1">Explore Our Amenities</h1>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum, neque at
                congue ornare, tellus tellus consequat elit, consectetur ultricies lectus mauris sit amet magna. Quisque
                porta sit amet risus sit amet tempor. Nunc metus enim, porttitor et nisl a, consectetur porta ex.
                Vestibulum tincidunt vestibulum nisi, id malesuada nisl bibendum non. Proin ut mauris dictum, pulvinar
                erat nec, tristique lorem. Proin libero mi, pulvinar vitae quam nec, eleifend congue ex. Vestibulum et
                dolor et orci volutpat placerat eu ac ex.</p>
        </div>
    </section>
    <section class="main-div1">
        <div class="col-7">
            <h1 class="heading1" style="text-align: right;">Explore Our <br>Amenities</h1>
            <p class="paragraph" style="text-align: right;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Suspendisse bibendum, neque at
                congue ornare, tellus tellus consequat elit, consectetur ultricies lectus mauris sit amet magna. Quisque
                porta sit amet risus sit amet tempor. Nunc metus enim, porttitor et nisl a, consectetur porta ex.
                Vestibulum tincidunt vestibulum nisi, id malesuada nisl bibendum non. Proin ut mauris dictum, pulvinar
                erat nec, tristique lorem. Proin libero mi, pulvinar vitae quam nec, eleifend congue ex. Vestibulum et
                dolor et orci volutpat placerat eu ac ex.</p>
        </div>
        <div class="col-5">
            <img src="{{ asset('frontend/images/image3.png') }}" style="width: 100%;">
        </div>
    </section>
    <section class="main-div1">
        <div class="col-5">
            <img src="{{ asset('frontend/images/image4.png') }}" style="width: 100%;">
        </div>
        <div class="col-7">
            <h1 class="heading1">Explore Our Amenities</h1>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum, neque at
                congue ornare, tellus tellus consequat elit, consectetur ultricies lectus mauris sit amet magna. Quisque
                porta sit amet risus sit amet tempor. Nunc metus enim, porttitor et nisl a, consectetur porta ex.
                Vestibulum tincidunt vestibulum nisi, id malesuada nisl bibendum non. Proin ut mauris dictum, pulvinar
                erat nec, tristique lorem. Proin libero mi, pulvinar vitae quam nec, eleifend congue ex. Vestibulum et
                dolor et orci volutpat placerat eu ac ex.</p>
        </div>
    </section>
    <section class="main-div2">
        <div class="col-12">
            <h1 class="gallery">Gallery</h1>
            <div class="grid-wrapper">
                <div>
                    <img src="{{ asset('frontend/images/gallery1.png') }}" alt="" />
                </div>
                <div>
                    <img src="{{ asset('frontend/images/gallery2.png') }}" alt="" />
                </div>
                <div class="tall">
                    <img src="{{ asset('frontend/images/gallery3.png') }}" alt="">
                </div>
                <div class="wide">
                    <img src="{{ asset('frontend/images/gallery4.png') }}" alt="" />
                </div>
                <div>
                    <img src="{{ asset('frontend/images/gallery5.png') }}" alt="" />
                </div>
                <div class="tall">
                    <img src="{{ asset('frontend/images/gallery6.png') }}" alt="" />
                </div>
                <div class="big">
                    <img src="{{ asset('frontend/images/gallery7.png') }}" alt="" />
                </div>
                <div>
                    <img src="{{ asset('frontend/images/gallery8.png') }}" alt="" />
                </div>
                <div class="tall">
                    <img src="{{ asset('frontend/images/gallery11.png') }}" alt="" />
                </div>
                <div>
                    <img src="{{ asset('frontend/images/gallery6.png') }}" alt="" />
                </div>
                <div>
                    <img src="{{ asset('frontend/images/gallery6.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="main-div3">
        <div class="col-12">
            <h1 class="map">Google Map</h1>
            <iframe class="map1"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.182370726!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2s!4v1699460228988!5m2!1sen!2s"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-inner">
            <div class="col-md-3">
                <img src="images/footer-logo.png" class="footer-logo" alt="">
                <p class="footer-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut elit tellus, luctus
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

</html>
