@extends('layout.app')
<style>
    .user-img {
        width: 38px;
        height: 38px;
        padding: 0px;
        border-radius: 50%;
    }
</style>
@section('content')
    <section>
        <div class="container hero-sec">
            <div class="row">
                <div class="hero-image" style="height:100vh; ">
                    <div class="hero-text">
                        <h2>WELCOME HOME TO PARK SHADOWS</h2>
                        <button> Learn More </button>
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
                            <div class="heading">
                                <div class="iconic">
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                </div>
                                <h2>AVAILABLE PROPERTIES</h2>
                                <p>Nothing is set in you can structure your exactly how you want.</p>
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
                                                <a class="effect-light" href="#">
                                                    <img width="100%" height="300"
                                                        style="    border-radius: 1.25rem !important;"
                                                        src="{{ asset('storage/' . $item->image) }}"
                                                        class="img-responsive wp-post-image" alt="" loading="lazy">
                                                </a>

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
                                                    <p class="item-address">{{ $item->address }}</p>
                                                    <h4 class="title"><a href="#">{{ $item->title }}</a></h4>
                                                    <div class="">
                                                         <p class="item-address">Website Link: <a href="{{ $item->promote_url }}" target="blank">{{ $item->promote_url }}</a></p>
                                                        <p class="item-address">Company's Website: <a href="{{ $item->company_website }}" target="blank">{{ $item->company_website }}</a></p>
                                                        <p class="item-address">Contact Information: {{ $item->email }}</p>
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
                                                    <p class="item-heading"><strong>Area</strong></p>
                                                    <p class="item-mesures">{{ $item->area }}</p>
                                                </div>
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Beds</strong></p>
                                                    <p class="item-mesures">{{ $item->baths }}</p>
                                                </div>
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Baths</strong></p>
                                                    <p class="item-mesures">{{ $item->baths }}</p>
                                                </div>
                                                <div class="title-head-lefty">
                                                    <p class="item-heading"><strong>Garages</strong></p>
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
                                <h2>Floor Plan</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-1.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-2.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-3.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-4.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-5.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-6.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-7.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('backend/images/map-8.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left ">
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                    elit. Fusce ut euismod eros, condimentum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
                        <!-- <div class="col-sm-4">
                                    <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                        <div class="media property-item">
                                            <div class="media-left">
                                                <div class="item-media item-media-thumb">
                                                    <a class="effect-light" href="#">
                                                        <img width="100%" height="300" src="{{ asset('backend/images/map-6.png') }}" class="img-responsive wp-post-image" alt="" loading="lazy">
                                                    </a>

                                                </div>
                                                </div>
                                                    <div class="media-body item-body clearfix ">
                                                        <div class="item-title-head table-block">
                                                            <div class="title-head-left ">
                                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h4>
                                                                <p class="item-address">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut euismod eros, condimentum.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div> -->
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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19547.357562814876!2d-104.97259257549148!3d39.72497635697503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7eec6e767e35%3A0x5670cccca5147bd1!2sDenver%20Country%20Club!5e0!3m2!1sen!2s!4v1707167336753!5m2!1sen!2s"
                        width="90%" height="550"
                        style="border:0; border-radius:30px; text-align: center;
                margin: 0px auto; display: table;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
