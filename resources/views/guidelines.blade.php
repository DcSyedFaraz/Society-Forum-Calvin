@extends('layout.app')
@section('content')
    <section class="container-fluid-banner">
        <div class="col-12">
            <h1 class="h1-about">Park Shadows HOA Community Forum Guidelines</h1>
            <hr class="devider">
        </div>
    </section>
    <section class="main-div">
        <div style="padding:0px 80px; font-family: 'Montserrat';" class="col-12">
            <!--<h1 class="heading1">PARK SHADOWS HOA COOKIE POLICY</h1>-->
            <img src=" {{ asset('frontend/images/circle.png') }}" class="circle">
            <p class="paragraph">
             <ul>
                 <li><strong>Respect and Civility:</strong> Treat all members with respect and kindness. Avoid offensive language, personal attacks, or discriminatory remarks based on race, gender, religion, nationality, sexual orientation, or any other characteristic.</li>
                 <br>
                 <li><strong>Constructive Communication:</strong> Engage in discussions thoughtfully and constructively. Provide feedback and express opinions in a respectful manner, even in disagreement. Focus on the substance of the conversation rather than attacking individuals.</li>
                 <br>
                 <li><strong>Stay on Topic:</strong> Keep discussions relevant to the forum's theme or purpose. Off-topic discussions can derail conversations and detract from the community's goals. If you wish to discuss something unrelated, please consider some other means of communication, perhaps offline..</li>
                 <br>
                 <li><strong>No Spamming or Self-Promotion:</strong> Refrain from posting repetitive or irrelevant messages, advertisements, or promotional content unrelated to the forum's subject matter. Excessive self-promotion or solicitation is not permitted.</li>
                 <br>
                 <li><strong>Moderation and Compliance: </strong> Follow the instructions of moderators and administrators. They enforce community guidelines and ensure that discussions remain respectful and productive. Failure to comply with guidelines may result in warnings, temporary suspension, or permanent bans.</li>
                  <br>
                 <li><strong>Help Maintain a Welcoming Environment:</strong> If you notice inappropriate behavior or content, report it to the Board of Directors  promptly. Help create a positive and inclusive atmosphere where all members feel welcome and valued.</li>
                  <br>
                 <li><strong>Moderation and Compliance: </strong> Follow the instructions of moderators and administrators. They enforce community guidelines and ensure that discussions remain respectful and productive. Failure to comply with guidelines may result in warnings, temporary suspension, or account deactivation.</li>
                  <br>
                 <strong>By following these guidelines, we can cultivate a vibrant and respectful community where members can share knowledge, exchange ideas, and build meaningful connections. Thank you for contributing to our community!</strong>
                 
             </ul>

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
