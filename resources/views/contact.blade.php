@extends('layout.app')
@section('content')
<section class="container-fluid-banner">
    <div class="col-12">
        <h1 class="h1-about">Contact Us</h1>
        <hr class="devider">
    </div>
</section>
<section class="main-div2">
    <div class="col-12">
        <h1 class="h1-contact">Get In Touch With Us</h1>
        <p class="para">The Park Shadows Homeowners Association is a non-profit mutual benefit corporation
            under IRC Section 501(c)(4) Homeowners’ Associations and applicable California regulations. We are
            located between East Avenue R-4 to the north and East Avenue R-8 to the South in Palmdale,
            California.
        </p>
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="post" id="contact-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" class="form-control input-lg" id="name"
                                    name="name" placeholder="Name" value="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control input-lg" id="email"
                                    name="email" placeholder="Email" value="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="subject" class="sr-only">Subject</label>
                                <input type="text" class="form-control input-lg" id="subject"
                                    name="subject" placeholder="Subject" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message" class="sr-only">Message</label>
                                <textarea class="form-control input-lg" rows="8" id="message" name="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-default btn-lg btn-block" id="send"
                                    data-loading-text="Sending...">Send message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
</section>
<section class="container-fluid-map">
    <iframe class="map2"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.182370726!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2s!4v1699460228988!5m2!1sen!2s"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>
@endsection
