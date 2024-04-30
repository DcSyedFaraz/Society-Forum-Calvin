@extends('real_estate.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img width="40%" src="{{ asset('backend/images/logo-main.png') }}">
                <br><br>
                <h1
                    style="font: normal normal 800 33px/33px Montserrat;
            letter-spacing: -0.82px;
            color: #432D00;
            text-transform: uppercase;
            opacity: 1;	">
                    Welcome {{ Auth::user()->name }}</h1>
                <br>
                <p style="width: 70%; margin: 0px auto;">Welcome to Park Shadows Homeowners Association, a vibrant community of 182 families nestled in the heart of
                Los Angeles County. Our safe, clean, and welcoming neighborhood is perfect for homebuyers seeking a peaceful
                environment to call home. As a nonprofit mutual benefit corporation, we promote home ownership and community
                engagement. Explore our well-maintained properties and join us in our exciting community events. Buy your
                dream home here and become part of our thriving community today!</p>
            </div>
        </div>
    </div>
@endsection
