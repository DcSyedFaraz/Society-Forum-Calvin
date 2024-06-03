@extends('layout.app')
@section('content')
    <section class="container-fluid-banner">
        <div class="col-12">
            <h1 class="h1-about">About Us</h1>
            <hr class="devider">
        </div>
    </section>
    <section class="main-div">
        <div class="row">
            <div class="col-lg-6 col-sm-12 px-5">
                <h1 class="heading1">About Us</h1>
                {{-- <img src=" {{ asset('frontend/images/circle.png') }}" class="circle"> --}}
                <p class="paragraph">
                    {{-- The Park Shadows Homeowners Association is a non-profit mutual benefit corporation
                under IRC Section 501(c)(4) Homeowners’ Associations and applicable California regulations. We are
                located between East Avenue R-4 to the north and East Avenue R-8 to the South in Palmdale,
                California.
                Our main entrances are through the intersections of East Avenue R-4 and Cardiff Street and East
                Avenue
                R-8 and Laderman Lane. The Laderman Lane entrance is considered our main entrance. We promote a
                welcoming community and home ownership. We welcome you to buy here and live here. Our goal is to
                increase home values for the benefit of all our neighbors --}}
                    Welcome to Park Shadows Homeowners Association, a vibrant community of 182 families nestled in the heart
                    of
                    Los Angeles County. Our safe, clean, and welcoming neighborhood is perfect for homebuyers seeking a
                    peaceful
                    environment to call home. As a nonprofit mutual benefit corporation, we promote home ownership and
                    community
                    engagement. Explore our well-maintained properties and join us in our exciting community events. Buy
                    your
                    dream home here and become part of our thriving community today!
                    @if ($document)
                        <p>Read more about us: <a href="{{ asset('storage/' . $document->file_path) }}"
                                target="_blank">{{ $document->file_name }}</a></p>
                    @else
                        <p>No document available.</p>
                    @endif
                </p>
            </div>
            <div class="col-lg-6 col-sm-12 px-5">
                <img src=" {{ asset('frontend/images/new/gallery (3).jpg') }}"
                    style="width: 95%; border-radius: 1.25rem !important;">
                <span class="d-flex justify-content-center font-weight-bold">
                    BUY HERE! LIVE HERE!
                </span>
            </div>
        </div>
    </section>
    {{-- <section class="main-div1" style="padding-bottom: 70px;">
        <div class="col-5">
            <img src=" {{ asset('frontend/images/dot.png') }}" class="dot">
            <img src=" {{ asset('frontend/images/image2.png') }}" style="width: 100%; z-index: 000000; position: relative;">
        </div>
        <div class="col-7">
            <h1 class="heading1">Explore Our Amenities</h1>
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum,
                neque at
                congue ornare, tellus tellus consequat elit, consectetur ultricies lectus mauris sit amet magna.
                Quisque
                porta sit amet risus sit amet tempor. Nunc metus enim, porttitor et nisl a, consectetur porta ex.
                Vestibulum tincidunt vestibulum nisi, id malesuada nisl bibendum non. Proin ut mauris dictum,
                pulvinar
                erat nec, tristique lorem. Proin libero mi, pulvinar vitae quam nec, eleifend congue ex. Vestibulum
                et
                dolor et orci volutpat placerat eu ac ex.</p>
        </div>
    </section> --}}
    <section class="container-fluid-banner">
        <div class="col-12">
            <div class="cta">
                <h1 class="h1-about">Get In Touch With Us</h1>
                <hr class="devider">
                <a href="{{ route('contact') }}"><button class="btn-2">Contact Us</button></a>
            </div>
        </div>
    </section>
@endsection
