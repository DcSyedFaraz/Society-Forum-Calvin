@extends('layout.app')
<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
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
                @forelse ($gallery as $image)
                    <div class="gallery">
                        <img data-src=" {{ asset('storage/' . $image->path) }}" src=" {{ asset('storage/' . $image->path) }}" alt="{{ $image->name }}" loading="lazy"/>
                    </div>
                @empty
                    <div class="alert alert-primary text-center" role="alert">
                        <strong>Oops!</strong> No images found.
                    </div>
                @endforelse
                {{-- <div>
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
            </div> --}}
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
    <script>
        // Initialize Lozad.js
        const observer = lozad('.gallery', {
            loaded: function(el) {
                el.src = el.getAttribute('data-src');
            }
        });

        // Observe the gallery container
        observer.observe();
    </script>
@endsection
