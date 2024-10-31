@extends('website.layouts.app')
@section('edecx')
<section class="section section-search banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Improve Your Lives With Learning</h1>
                <p>Nemo enim ipsam,voluptatem quia voluptas sit aspernatur aut odit</p>
            </div>
        </div>
    </div>
</section>
<section class="contact-page-section">
    <div class="container">
        <div class="inner-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Get in touch</h2>
            </div>
            <!-- Contact Form -->
            <div class="contact-form">
                <!-- Profile Form -->
                <form method="post" action="{{ action('Website\ContactusController@contactstore') }}" id="contact-form" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="fname" placeholder="Name*" required="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="phone_no" placeholder="Phone Number*" required="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="email" name="contact_email" placeholder="Email Address*" required="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="age" placeholder="Age*" required="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="address" placeholder="Address*" required="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                            <input type="text" name="hobbies" placeholder="hobbies*" required="">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea class="" name="message" placeholder="Send Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-right">
                            <button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Send Message <i class="fa fa-angle-right"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact Info Section -->
        <div class="contact-info-section">
            <div class="title-box">
                <h2>Contact Information</h2>
                <div class="text">Lorem Ipsum is simply dummy text of the printing <br> and typesetting industry.</div>
            </div>
            <div class="row clearfix">
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="info-inner">
                        <div class="icon fa fa-phone"></div>
                        <strong>Phone</strong>
                        <ul>
                            <li><a href="tel:{{ $contactf->contactno }}">{{ $contactf->contactno }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="info-inner">
                        <div class="icon fa fa-envelope"></div>
                        <strong>Email</strong>
                        <ul>
                            <li><a href="mailto:{{ $contactf->emailid }}">{{ $contactf->emailid }}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="info-inner">
                        <div class="icon fa fa-map-marker"></div>
                        <strong>Address</strong>
                        <ul>
                            <li>{{ $contactf->address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   <section class="map">
       <iframe src="{{ $contactf->maplink }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
   </section>
@endsection
