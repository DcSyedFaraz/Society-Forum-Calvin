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
    <style>
        .active {
            color: #978661 !important;
        }
    </style>
    <title>Calvin</title>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold" href="#"><img src="{{ asset('assets/imges/logo-dark.png') }}">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} active"
                                    aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">Real Estate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}"
                                    href="{{ route('gallery') }}">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('about_us') ? 'active' : '' }}"
                                    href="{{ route('about_us') }}">About Us</a>
                            </li>
                        </ul>
                        <!-- /////////////////// -->
                        <div class="search">
                            <div class="input-group">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="search" id="form1" class="form-control" placeholder="Search" />
                                </div>
                                <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /////////////////// -->

                        <a href="{{ route('contact') }}" class="btn btn-outline-dark fw-bold" type="submit">Contact
                            Us</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
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
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="item-wrap infobox_trigger homey-matchHeight" data-id="43205">
                                <div class="media property-item">
                                    <div class="media-left">
                                        <div class="item-media item-media-thumb">
                                            <span class="label-wrap top-left">
                                                <span class="label label-success label-featured">Featured</span>
                                                <span class="label label-success label-featured">For Sale</span>
                                            </span>
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('assets/imges/listing-pic.png') }}"
                                                    class="img-responsive wp-post-image" alt="" loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-blocker">
                                            <div class="title-head-left-content">
                                                <address class="item-price">$1,600.00/mo</address>
                                                <address class="item-cutprice">- $6.000.00/sq ft</address>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <address class="item-address">Villa Savoye Plan</address>
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h3>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <img width="40px" src="{{ asset('assets/imges/admin-post.png') }}">
                                                <p class="name"><a href="#">Leonard L. Edwards</a></p>
                                            </div>
                                            <div class="title-head-left">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="#">412-423-4429</a>
                                            </div>
                                        </div>

                                        <div class="dividerss"></div>

                                        <div class="item-title-head table-block">
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Area</strong></p>
                                                <p class="item-mesures">2100 m2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Beds</strong></p>
                                                <p class="item-mesures">3</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Baths</strong></p>
                                                <p class="item-mesures">2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Garages</strong></p>
                                                <p class="item-mesures">1</p>
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
                                            <span class="label-wrap top-left">
                                                <span class="label label-success label-featured">Featured</span>
                                                <span class="label label-success label-featured">For Sale</span>
                                            </span>
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('assets/imges/listing-pic.png') }}"
                                                    class="img-responsive wp-post-image" alt=""
                                                    loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-blocker">
                                            <div class="title-head-left-content">
                                                <address class="item-price">$1,600.00/mo</address>
                                                <address class="item-cutprice">- $6.000.00/sq ft</address>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <address class="item-address">Villa Savoye Plan</address>
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h3>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <img width="40px" src="{{ asset('assets/imges/admin-post.png') }}">
                                                <p class="name"><a href="#">Leonard L. Edwards</a></p>
                                            </div>
                                            <div class="title-head-left">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="#">412-423-4429</a>
                                            </div>
                                        </div>

                                        <div class="dividerss"></div>

                                        <div class="item-title-head table-block">
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Area</strong></p>
                                                <p class="item-mesures">2100 m2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Beds</strong></p>
                                                <p class="item-mesures">3</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Baths</strong></p>
                                                <p class="item-mesures">2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Garages</strong></p>
                                                <p class="item-mesures">1</p>
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
                                            <span class="label-wrap top-left">
                                                <span class="label label-success label-featured">Featured</span>
                                                <span class="label label-success label-featured">For Sale</span>
                                            </span>
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('assets/imges/listing-pic.png') }}"
                                                    class="img-responsive wp-post-image" alt=""
                                                    loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-blocker">
                                            <div class="title-head-left-content">
                                                <address class="item-price">$1,600.00/mo</address>
                                                <address class="item-cutprice">- $6.000.00/sq ft</address>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <address class="item-address">Villa Savoye Plan</address>
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h3>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <img width="40px" src="{{ asset('assets/imges/admin-post.png') }}">
                                                <p class="name"><a href="#">Leonard L. Edwards</a></p>
                                            </div>
                                            <div class="title-head-left">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="#">412-423-4429</a>
                                            </div>
                                        </div>

                                        <div class="dividerss"></div>

                                        <div class="item-title-head table-block">
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Area</strong></p>
                                                <p class="item-mesures">2100 m2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Beds</strong></p>
                                                <p class="item-mesures">3</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Baths</strong></p>
                                                <p class="item-mesures">2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Garages</strong></p>
                                                <p class="item-mesures">1</p>
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
                                            <span class="label-wrap top-left">
                                                <span class="label label-success label-featured">Featured</span>
                                                <span class="label label-success label-featured">For Sale</span>
                                            </span>
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('assets/imges/listing-pic.png') }}"
                                                    class="img-responsive wp-post-image" alt=""
                                                    loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-blocker">
                                            <div class="title-head-left-content">
                                                <address class="item-price">$1,600.00/mo</address>
                                                <address class="item-cutprice">- $6.000.00/sq ft</address>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <address class="item-address">Villa Savoye Plan</address>
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h3>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <img width="40px" src="{{ asset('assets/imges/admin-post.png') }}">
                                                <p class="name"><a href="#">Leonard L. Edwards</a></p>
                                            </div>
                                            <div class="title-head-left">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="#">412-423-4429</a>
                                            </div>
                                        </div>

                                        <div class="dividerss"></div>

                                        <div class="item-title-head table-block">
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Area</strong></p>
                                                <p class="item-mesures">2100 m2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Beds</strong></p>
                                                <p class="item-mesures">3</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Baths</strong></p>
                                                <p class="item-mesures">2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Garages</strong></p>
                                                <p class="item-mesures">1</p>
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
                                            <span class="label-wrap top-left">
                                                <span class="label label-success label-featured">Featured</span>
                                                <span class="label label-success label-featured">For Sale</span>
                                            </span>
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('assets/imges/listing-pic.png') }}"
                                                    class="img-responsive wp-post-image" alt=""
                                                    loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-blocker">
                                            <div class="title-head-left-content">
                                                <address class="item-price">$1,600.00/mo</address>
                                                <address class="item-cutprice">- $6.000.00/sq ft</address>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <address class="item-address">Villa Savoye Plan</address>
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h3>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <img width="40px" src="{{ asset('assets/imges/admin-post.png') }}">
                                                <p class="name"><a href="#">Leonard L. Edwards</a></p>
                                            </div>
                                            <div class="title-head-left">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="#">412-423-4429</a>
                                            </div>
                                        </div>

                                        <div class="dividerss"></div>

                                        <div class="item-title-head table-block">
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Area</strong></p>
                                                <p class="item-mesures">2100 m2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Beds</strong></p>
                                                <p class="item-mesures">3</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Baths</strong></p>
                                                <p class="item-mesures">2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Garages</strong></p>
                                                <p class="item-mesures">1</p>
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
                                            <span class="label-wrap top-left">
                                                <span class="label label-success label-featured">Featured</span>
                                                <span class="label label-success label-featured">For Sale</span>
                                            </span>
                                            <a class="effect-light" href="#">
                                                <img width="100%" height="300"
                                                    src="{{ asset('assets/imges/listing-pic.png') }}"
                                                    class="img-responsive wp-post-image" alt=""
                                                    loading="lazy">
                                            </a>

                                        </div>
                                    </div>
                                    <div class="media-body item-body clearfix ">
                                        <div class="item-title-head table-blocker">
                                            <div class="title-head-left-content">
                                                <address class="item-price">$1,600.00/mo</address>
                                                <address class="item-cutprice">- $6.000.00/sq ft</address>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <address class="item-address">Villa Savoye Plan</address>
                                                <h4 class="title"><a href="#">Villa in Coral Gables</a></h3>
                                            </div>
                                        </div>
                                        <div class="item-title-head table-block">
                                            <div class="title-head-left">
                                                <img width="40px" src="{{ asset('assets/imges/admin-post.png') }}">
                                                <p class="name"><a href="#">Leonard L. Edwards</a></p>
                                            </div>
                                            <div class="title-head-left">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <a href="#">412-423-4429</a>
                                            </div>
                                        </div>

                                        <div class="dividerss"></div>

                                        <div class="item-title-head table-block">
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Area</strong></p>
                                                <p class="item-mesures">2100 m2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Beds</strong></p>
                                                <p class="item-mesures">3</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Baths</strong></p>
                                                <p class="item-mesures">2</p>
                                            </div>
                                            <div class="title-head-lefty">
                                                <p class="item-heading"><strong>Garages</strong></p>
                                                <p class="item-mesures">1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .item-wrap -->
                        </div>
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

    <footer>
        <div class="container upper-footer">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('assets/imges/logo-light.png') }}">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut elit tellus, luctus nec ullamcorper ma
                    </p>
                </div>
                <div class="col-4">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Membership Login</a></li>
                        <li><a href="#">Executive Login</a></li>
                        <li><a href="#">Real Estate Login</a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <h4>Available Properties</h4>
                    <p>Bertlein Propery Manaagment 25031 W Avenue Standford Valencia, Ca 91355 <br>661-257-1570</p>
                </div>
            </div>
        </div>
        <div class="container lower-footer">
            <div class="row">
                <p>&copy; 2024 Park Shadows Hoa. All rights reserved</p>
            </div>
        </div>
    </footer>

</body>
<script src="{{ asset('assets/js/scripity.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
