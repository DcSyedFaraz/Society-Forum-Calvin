@extends('layout.app')
<style>
    a,
    li,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Montserrat' !important;
        overflow-wrap: break-word;
    }

    .mobile {
        display: block;
        width: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .fancybox-toolbar {
        display: none;
    }

    .fancybox-show-nav .fancybox-navigation {
        display: none !important;
    }

    span.label-wrap.top-left {
        z-index: 2;
    }

    .user-img {
        width: 38px;
        height: 38px;
        padding: 0px;
        border-radius: 50%;

        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .title {
            margin-top: 50px;
        }

        .title h1 {
            text-align: center;
            margin: 0;
            padding: 0;
            font-family: Arial;
            text-transform: uppercase;
            color: #d63031;
        }

        .title h1 span {
            display: block;
            color: #300a0a;
            font-size: 20px;
            margin-bottom: 10px;
        }

        /*Carousel Gallery*/
        .carousel-gallery {
            margin: 50px 0;
            padding: 0 30px;
        }

        .carousel-gallery .swiper-slide a {
            display: block;
            width: 100%;
            height: 200px;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            -webkit-box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, .2);
            -moz-box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, .2);
            box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, .2);
        }

        .carousel-gallery .swiper-slide a:hover .image .overlay {
            opacity: 1;
        }

        .carousel-gallery .swiper-slide a .image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center center;
        }

        .carousel-gallery .swiper-slide a .image .overlay {
            width: 100%;
            height: 100%;
            background-color: rgba(20, 20, 20, .8);
            text-align: center;
            opacity: 0;
            -webkit-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .carousel-gallery .swiper-slide a .image .overlay em {
            color: #fff;
            font-size: 26px;
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            display: inline-block;
        }

        .carousel-gallery .swiper-pagination {
            position: relative;
            bottom: auto;
            text-align: center;
            margin-top: 25px;
        }

        .carousel-gallery .swiper-pagination .swiper-pagination-bullet {
            -webkit-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }

        .carousel-gallery .swiper-pagination .swiper-pagination-bullet:hover {
            opacity: 0.7;
        }

        .carousel-gallery .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
            background-color: #d63031;
            transform: scale(1.1, 1.1);
        }

        /*# Carousel Gallery*/
        .plugins {
            text-align: center;
        }

        .plugins h3 {
            text-align: center;
            margin: 0;
            padding: 0;
            font-family: Arial;
            text-transform: uppercase;
            color: #111;
        }

        .plugins a {
            display: inline-block;
            font-family: Arial;
            color: #777;
            font-size: 14px;
            margin: 10px;
            transition: all 0.2s linear;
        }

        .plugins a:hover {
            color: #d63031;
        }

    }
</style>
@section('content')
    <section>
        <div class="container hero-sec">
            <div class="row">
                <div class="hero-image" style="height:100vh; ">
                    <div class="hero-text">
                        <h2>WELCOME HOME TO PARK SHADOWS</h2>
                        {{-- <button> Learn More </button> --}}
                    </div>

                </div>
            </div>
        </div>
        <!-- /////////////////////////////////// -->
        <div class="container listing-sec">
            <div class="row">
                <div class="listing-wrap  item-grid-view">
                    <div class="container heading">
                        <div class="row">
                            <div class="heading" id="estate">
                                <div class="iconic">
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                </div>
                                <h2>AVAILABLE PROPERTIES</h2>
                                <!--<p>Nothing is set in you can structure your exactly how you want.</p>-->
                                <p>Homeowners, not investors!</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @forelse ($property as $item)
                            <div class="col-sm-4">
                                <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                    <div class="media property-item">
                                        <div class="media-left">
                                            <div class="item-media item-media-thumb">
                                                <span class="label-wrap top-left">
                                                    <span class="label label-success label-featured">For Sale</span>
                                                    {{-- <span class="label label-success label-featured">For Sale</span> --}}
                                                </span>

                                                <!--Carousel Gallery-->
                                                <div class="carousel-gallery">
                                                    <div class="swiper-container">
                                                        <div class="swiper-wrapper">
                                                            @foreach ($item->images as $image)
                                                                <div class="swiper-slide">
                                                                    <a class="effect-light"
                                                                        href="{{ asset('storage/' . $image->image) }}"
                                                                        data-fancybox="gallery">
                                                                        <div class="image">
                                                                            <img width="100%" height="300"
                                                                                style="border-radius: 1.25rem !important;"
                                                                                src="{{ asset('storage/' . $image->image) }}"
                                                                                class="img-responsive wp-post-image"
                                                                                alt="" loading="lazy">
                                                                            <div class="overlay">
                                                                                <em class="mdi mdi-magnify-plus"></em>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--#Carousel Gallery-->



                                            </div>
                                        </div>
                                        <div class="media-body item-body clearfix ">
                                            <div class="item-title-head table-blocker">
                                                <div class="title-head-left-content">
                                                    <address class="item-price">${{ $item->price }}</address>
                                                    {{-- <address class="item-cutprice">- $6.000.00/sq ft</address> --}}
                                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="item-title-head table-block">
                                                <div class="title-head-left">
                                                    <h4 class="title"><a href="#">{{ $item->title }}</a></h4>
                                                    <p class="item-address">{{ $item->address }}</p>

                                                    <div class="">
                                                        <p class="item-address">Website Link: <a
                                                                href="{{ strpos($item->promote_url, 'http://') === 0 || strpos($item->promote_url, 'https://') === 0 ? $item->promote_url : 'http://' . $item->promote_url }}"
                                                                target="_blank">
                                                                {{ strpos($item->promote_url, 'http://') === 0 || strpos($item->promote_url, 'https://') === 0 ? $item->promote_url : 'http://' . $item->promote_url }}
                                                            </a></p>

                                                        <p class="item-address">Company's Website: <a
                                                                href="{{ strpos($item->company_website, 'http://') === 0 || strpos($item->company_website, 'https://') === 0 ? $item->company_website : 'http://' . $item->company_website }}"
                                                                target="_blank">
                                                                {{ strpos($item->company_website, 'http://') === 0 || strpos($item->company_website, 'https://') === 0 ? $item->company_website : 'http://' . $item->company_website }}
                                                            </a></p>
                                                        <p class="item-address">Contact Information: {{ $item->email }}
                                                        </p>
                                                        <p class="item-address">Price: ${{ $item->price }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="item-title-head table-block">
                                                <div class="title-head-left">
                                                    <img width="40px"
                                                        @if (!$item->user->image) src="{{ asset('assets/imges/admin-post.png') }}"
                                            @else
                                           class="user-img" src="{{ asset('storage/images/' . $item->user->image) }}" @endif>
                                                    <p class="name"><a href="#">{{ $item->user->name }}</a></p>
                                                </div>
                                                <div class="title-head-left">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <a href="#">{{ $item->phone }}</a>
                                                </div>
                                            </div>

                                            <div class="dividerss"></div>

                                            <div class="item-title-head table-block">
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Area (sq ft)</strong></p>
                                                    <p class="item-mesures">{{ $item->area }}</p>
                                                </div>
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Beds</strong></p>
                                                    <p class="item-mesures">{{ $item->beds }}</p>
                                                </div>
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Baths</strong></p>
                                                    <p class="item-mesures">{{ $item->baths }}</p>
                                                </div>
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Garage (no. of cars)</strong></p>
                                                    <p class="item-mesures">{{ $item->garages }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- .item-wrap -->
                            </div>
                        @empty
                            <div class="alert alert-info text-center" role="alert">
                                It seems that there are currently no property available. Please check back later for new
                                properties!
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
        <!-- //////////////////////////////// -->
        <div class="container listing-sec">
            <div class="row">
                <div class="listing-wrap  item-grid-view">
                    <div class="container heading">
                        <div class="row">
                            <div class="heading">
                                <h5>If you would like the HOA to open the R8 gate for an Open House, please email <a
                                        href="mailto:parkshadowshomeowners@gmail.com">parkshadowshomeowners@gmail.com</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////// -->
        <div class="container listing-sec">
            <div class="row">
                <div class="listing-wrap  item-grid-view">
                    <div class="container heading">
                        <div class="row">
                            <div class="heading">
                                <h2>Floor Plan</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @forelse ($plans as $plan)
                            <div class="col-sm-4">
                                <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                    <div class="media property-item">
                                        <div class="media-left">
                                            <div class="item-media item-media-thumb">
                                                <a class="effect-light" href="#">
                                                    <img width="100%" height="300"
                                                        src="{{ asset('storage/' . $plan->path) }}"
                                                        class="img-responsive wp-post-image" alt=""
                                                        loading="lazy">
                                                </a>

                                            </div>
                                        </div>
                                        @if ($plan->caption)
                                            <div class="media-body item-body clearfix ">
                                                <div class="item-title-head table-block">
                                                    <div class="title-head-left ">
                                                        {{-- <h4 class="title"><a href="#">Villa in Coral Gables</a></h4> --}}
                                                        <p class="item-address">{{ $plan->caption }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- .item-wrap -->
                            </div>
                        @empty
                            <div class="alert alert-info text-center" role="alert">
                                It seems that there are currently no plan available. Please check back later for new
                                floor plans!
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- Map -->
        <div class="container map-sec">
            <div class="row">
                <div class="container heading">
                    <div class="row">
                        <div class="heading">
                            <h2>Google Map</h2>

                        </div>
                    </div>
                </div>
                <div class="container map-emmeded">
                    <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.4808189429596!2d-118.09030472415338!3d34.5666984903909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c257e806603255%3A0x2fd1e1713c6dddfc!2s2325%20Mark%20Ave%2C%20Palmdale%2C%20CA%2093550%2C%20USA!5e0!3m2!1sen!2s!4v1712351912480!5m2!1sen!2s"
                        width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
