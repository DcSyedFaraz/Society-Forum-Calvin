@extends('layout.app')
{{-- reCAPTCHA --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
                    <form action="{{ route('contact_us') }}" method="post" id="contact-form">
                        @method('Post')
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" class="form-control input-lg" id="name" name="name"
                                        placeholder="Name" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" class="form-control input-lg" id="email" name="email"
                                        placeholder="Email" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="subject" class="sr-only">Subject</label>
                                    <input type="text" class="form-control input-lg" id="subject" name="subject"
                                        placeholder="Subject" value="">
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
                                    <div class="g-recaptcha" data-sitekey="6Ld1j4oqAAAAAEVkLOgstLWbpOOw8OjpOUhEJrUc"></div>

                                    <button class="btn btn-default btn-lg btn-block" id="send"
                                        data-loading-text="Sending...">Send message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
    </section>
    <section class="container-fluid-map">
        <iframe class="map1"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.4808189429596!2d-118.09030472415338!3d34.5666984903909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c257e806603255%3A0x2fd1e1713c6dddfc!2s2325%20Mark%20Ave%2C%20Palmdale%2C%20CA%2093550%2C%20USA!5e0!3m2!1sen!2s!4v1712351912480!5m2!1sen!2s"
            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
