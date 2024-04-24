@extends('layout.app')
@section('content')
    <section class="container-fluid-banner">
        <div class="col-12">
            <h1 class="h1-about">PARK SHADOWS HOA COOKIE POLICY</h1>
            <hr class="devider">
        </div>
    </section>
    <section class="main-div">
        <div style="padding-left:80px; font-family: 'Montserrat';" class="col-10">
            <!--<h1 class="heading1">PARK SHADOWS HOA COOKIE POLICY</h1>-->
            <img src=" {{ asset('frontend/images/circle.png') }}" class="circle">
            <p class="paragraph">
               This Cookie Policy explains how we use cookies and similar technologies to enhance your experience on our website while respecting your privacy. By using our website, you consent to the use of cookies in accordance with this policy.<br><br>

                <strong>WHAT ARE COOKIES?</strong><br>

                Cookies are small pieces of data stored on your device (computer or mobile device) when you visit a website. They are widely used to make websites work more efficiently and to provide information to website owners.<br><br>

                <h4>HOW WE USE COOKIES</h4><br>

                We use cookies for the following purposes:<br><br>

                <strong>ENHANCING USER EXPERIENCE:</strong><br>
                Cookies help us provide you with a personalized experience by remembering your preferences and settings. For example, they remember your login details, language preferences, and display settings.<br><br>

                <strong>ANALYZING WEBSITE PERFORMANCE: </strong><br>
                We use cookies to analyze how visitors use our website, which helps us improve its performance and functionality. These cookies collect anonymous information about visitor behavior, such as the number of visitors to the website and the pages they visit most often.<br><br>

                <strong>THIRD PARTY INTEGRATIONS:</strong> <br>
                Some cookies may be placed by third-party services that appear on our website. These cookies are used for purposes such as analyzing website traffic, delivering targeted advertisements, and providing social media features.<br><br>

                <strong>YOUR PRIVACY:</strong><br>

                We respect your privacy and are committed to protecting your personal information. We do not sell, trade, or otherwise transfer your personal information to third parties without your consent. Any information collected through cookies is used solely for the purposes outlined in this policy.<br><br>

                <strong>MANAGING COOKIES:</strong><br>

                You can control and manage cookies in various ways. Most web browsers allow you to accept or reject cookies, delete existing cookies, and set preferences for future cookie usage. Please note that disabling cookies may affect your experience on our website and limit certain functionalities.
                <br><br>


                <strong>CHANGES TO THIS POLICY</strong><br>

                We may update this Cookie Policy from time to time to reflect changes in our practices or legal requirements. We encourage you to review this policy periodically for any updates or changes.<br><br>

                <strong>CONTACT US</strong><br>

                If you have any questions or concerns about our use of cookies or this Cookie Policy, please contact us at parkshadowshomeowners@gmail.com<br><br>

            </p>
        </div>
        <!--<div class="col-6">-->
        <!--    <img src=" {{ asset('frontend/images/new/gallery (3).jpg') }}"-->
        <!--        style="width: 95%; border-radius: 1.25rem !important;">-->
        <!--        <span class="d-flex justify-content-center font-weight-bold">-->
        <!--            BUY HERE! LIVE HERE!-->
        <!--        </span>-->
        <!--</div>-->
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
    <!--<section class="container-fluid-banner">-->
    <!--    <div class="col-12">-->
    <!--        <div class="cta">-->
    <!--            <h1 class="h1-about">Get In Touch With Us</h1>-->
    <!--            <hr class="devider">-->
    <!--            <a href="{{ route('contact') }}"><button class="btn-2">Contact Us</button></a>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
@endsection
