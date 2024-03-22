@extends('layout.app')

@section('content')
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
            {{-- <div>
                <img src=" {{ asset('frontend/images/new/gallery8.png') }}" alt="" />
            </div>
            <div class="tall">
                <img src=" {{ asset('frontend/images/new/gallery11.png') }}" alt="" />
            </div>
            <div>
                <img src=" {{ asset('frontend/images/new/gallery6.png') }}" alt="" />
            </div>
            <div>
                <img src=" {{ asset('frontend/images/new/gallery6.png') }}" alt="" />
            </div> --}}
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
@endsection
