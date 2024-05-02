@extends('layout.app')
@section('content')
    <section class="container-fluid">
        <div class="banner-inner">
            <h1 class="title">welcome to park <br>shadows HOA</h1>
            <!--<img src="{{ asset('frontend/images/lines.png') }}" class="line">-->
            <div class="buttons">
                <a href="{{ route('login') }}"><button class="btn-b">Member Login</button></a>
                <a href="{{ route('estate_login') }}"><button class="btn-b">Real Estate Login</button></a>
                <a href="{{ route('executive_login') }}"><button class="btn-b">Executive Login</button></a>
            </div>
        </div>
    </section>
    <section class="main-div">
        <div class="row">
            <div class="col-lg-6 col-sm-12 px-5 py-5">
                <h1 class="heading1">About Us</h1>
                <img src="{{ asset('frontend/images/circle.png') }}" class="circle">
                <p class="paragraph">The Park Shadows Homeowners Association is a non-profit mutual benefit corporation
                    under IRC Section 501(c)(4) Homeowners’ Associations and applicable California regulations. We are
                    located between East Avenue R-4 to the north and East Avenue R-8 to the South in Palmdale, California.
                    Our main entrances are through the intersections of East Avenue R-4 and Cardiff Street and East Avenue
                    R-8 and Laderman Lane. The Laderman Lane entrance is considered our main entrance. We promote a
                    welcoming community and home ownership. We welcome you to buy here and live here. Our goal is to
                    increase home values for the benefit of all our neighbors.</p>
                <a href="#"><button class="btn-1">Learn More</button></a>
            </div>
            <div class="col-lg-6 col-sm-12 px-5">
                <img src="{{ asset('frontend/images/new/gallery (2).jpg') }}" class=""
                    style="width: 95%;border-radius: 1.25rem !important;">
                <span class="d-flex justify-content-center font-weight-bold">
                    BUY HERE! LIVE HERE!
                </span>
            </div>
        </div>
    </section>
    <section class="main-div1">
        <div class="col-12">
            <h1 style="text-align:center;" class="heading1">Explore Our Amenities</h1>
        </div>
    </section>
    <section class="main-div1">
        <div class="row">
            <div class="col-lg-5 col-sm-12 px-5">
                <img src="{{ asset('frontend/images/dot.png') }}" class="dot">
                <img src="{{ asset('frontend/images/image2.png') }}"
                    style="width: 100%; z-index: 000000; position: relative;">
            </div>
            <div class="col-lg-7 col-sm-12 px-5 py-3">
                <h1 class="heading1">Community Park</h1>
                <p class="paragraph">Experience our new park designed for children of all ages! From playground areas to
                    swing sets and workout stations, our well-lit park ensures safety and enjoyment for all. Plus, indulge
                    in basketball games at our popular court. Don't miss out on our exciting community events, including
                    Easter Egg hunts, 4th of July celebrations, movie nights, Halloween adventures, and evenings with Santa.
                    We also host community garage sales twice a year.</p>
            </div>
        </div>
    </section>
    <section class="main-div1 safety">
        <div class="row">
            <div class="col-lg-7 col-sm-12 px-5 py-3">
                <h1 class="heading1" style="text-align: right;">Safety</h1>
                <p class="paragraph" style="text-align: right;">At Park Shadows HOA, safety is our priority. Our community
                    is patrolled by security guards seven nights a week, ensuring a safe environment for families. During
                    pool season, a dedicated guard oversees pool safety. With security gates and monitored entrances
                    equipped with cameras, access is controlled via community-issued remotes and entry codes. Report any
                    concerns through our new website for prompt resolution.</p>
            </div>
            <div class="col-lg-5 col-sm-12 px-5">
                <img src="{{ asset('frontend/images/new/gallery (3).jpg') }}"
                    style="width: 100%; border-radius: 1.25rem !important;">
            </div>
        </div>
    </section>
    <section class="main-div1 ">
        <div class="row">
            <div class="col-lg-5 col-sm-12 px-5">
                <img src="{{ asset('frontend/images/image4.png') }}" style="width: 100%;">
            </div>
            <div class="col-lg-7 col-sm-12 px-5 py-3">
                <h1 class="heading1">Swimming Pool</h1>
                <p class="paragraph">Discover the joy of our community swimming pool area, featuring a pool accommodating up
                    to 32 guests, along with a wading pool perfect for small children. Enjoy gatherings and relaxation with
                    our available barbecue grill and spacious covered patio.</p>
            </div>
        </div>
    </section>
    <section class="main-div2">
        <div class="col-12">
            <div class="row">
                <h1 class="gallery">Gallery</h1>
                <div class="grid-wrapper">
                    @forelse ($gallery as $image)
                        <div class="gallery">
                            <img data-src=" {{ asset('storage/' . $image->path) }}"
                                src=" {{ asset('storage/' . $image->path) }}" alt="{{ $image->name }}" loading="lazy" />
                        </div>
                    @empty
                        <div class="alert alert-primary text-center" role="alert">
                            <strong>Oops!</strong> No images found.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section class="main-div3">
        <div class="col-12">
            <h1 class="map">Google Map</h1>
            <iframe class="map1"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.4808189429596!2d-118.09030472415338!3d34.5666984903909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c257e806603255%3A0x2fd1e1713c6dddfc!2s2325%20Mark%20Ave%2C%20Palmdale%2C%20CA%2093550%2C%20USA!5e0!3m2!1sen!2s!4v1712351912480!5m2!1sen!2s"
                width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
