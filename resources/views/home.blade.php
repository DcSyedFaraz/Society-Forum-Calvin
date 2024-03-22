@extends('layout.app')
@section('content')
    <section class="container-fluid">
        <div class="banner-inner">
            <h1 class="title">welcome to park <br>shadows HOA</h1>
            <img src="{{ asset('frontend/images/lines.png') }}" class="line">
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
            <img src="{{ asset('frontend/images/new/gallery (2).jpg') }}" class="" style="width: 95%;border-radius: 1.25rem !important;">
        </div>
    </section>
    <section class="main-div1">
        <div class="col-5">
            <img src="{{ asset('frontend/images/dot.png') }}" class="dot">
            <img src="{{ asset('frontend/images/image2.png') }}" style="width: 100%; z-index: 000000; position: relative;">
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
            <img src="{{ asset('frontend/images/new/gallery (3).jpg') }}" style="width: 100%; border-radius: 1.25rem !important;">
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
                {{-- <div>
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
                </div> --}}
                <div>
                    <img src=" {{ asset('frontend/images/new/gallery (2).jpg') }}" alt="" />
                </div>
                <div>
                    <img src=" {{ asset('frontend/images/new/gallery (3).jpg') }}" alt="" />
                </div>
                <div class="tall">
                    <img src=" {{ asset('frontend/images/new/gallery (4).jpg') }}" alt="">
                </div>
                <div class="wide">
                    <img src=" {{ asset('frontend/images/new/gallery (5).jpg') }}" alt="" />
                </div>
                <div>
                    <img src=" {{ asset('frontend/images/new/gallery (6).jpg') }}" alt="" />
                </div>
                <div class="tall">
                    <img src=" {{ asset('frontend/images/new/gallery (7).jpg') }}" alt="" />
                </div>
                <div class="big">
                    <img src=" {{ asset('frontend/images/new/gallery.jpg') }}" alt="" />
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
@endsection
