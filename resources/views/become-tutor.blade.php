
@extends('website.layouts.app')
@section('edecx')

<section class="section section-search banner banner-become">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Access thousands of private tutoring jobs in Maths, English, Science, French, Spanish… anything!</h1>
                <p>Whether you are new to tutoring or an established professional tutor, we will help you find new students.</p>
            </div>
            <div class="search-box">
                <a href="#" class="btn btn_find">Start Teaching</a>
            </div>
        </div>
    </div>
</section>
<!-- /Home Banner -->
<!-- Section 2 -->
<section class="sec-two">
    <div class="container">
        <h2 class="center">Grow your tuition business, quickly and simply</h2>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="feature-circle">
                    <div class="image">
                        <img src="{{asset('edecx/website/assets/img/to-do.png')}}" alt="">
                        <i class="arrow"><img src="{{asset('edecx/website/assets/img/arrow-right-02.png')}}" alt=""></i>
                    </div>
                    <h3>Select your own subjects</h3>
                </div>
                <!--/ .feature-circle-->
            </div>
            <!--/ .col-sm-4-->
            <div class="col-md-4 col-sm-4">
                <div class="feature-circle">
                    <div class="image">
                        <img src="{{asset('edecx/website/assets/img/to-do-2.png')}}" alt="">
                        <i class="arrow"><img src="{{asset('edecx/website/assets/img/arrow-right-02.png')}}" alt=""></i>
                    </div>
                    <h3>Choose your own students</h3>
                </div>
                <!--/ .feature-circle-->
            </div>
            <!--/ .col-sm-4-->
            <div class="col-md-4 col-sm-4">
                <div class="feature-circle">
                    <div class="image">
                        <img src="{{asset('edecx/website/assets/img/to-do-3.png')}}" alt="">
                    </div>
                    <h3>Take control of your business</h3>
                </div>
                <!--/ .feature-circle-->
            </div>
            <!--/ .col-sm-4-->
        </div>
        <!--/ .row-->
    </div>
</section>
<!-- /Section 2 -->
<!-- register -->
<section class="register-sec">
    <div class="overlay"></div>
    <div class="container">
        <h2>How To Become A Tutor</h2>
        <p>It’s completely free to have a profile and gain acess to thousands of students who are actively seeking tuition. Our commission system means that we only earn when you do.</p>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="{{ url('tutor/register') }}">
                    <div class="register-box">
                        <div class="register-text">
                            <img src="{{asset('edecx/website/assets/img/r-01.png')}}">
                            <h4>1. Sign up and create a free profile</h4>
                             <a href="{{ url('tutor/register') }}">Register</a>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="register-box">
                    <div class="register-text">
                        <img src="{{asset('edecx/website/assets/img/r-02.png')}}">
                        <h4>2. Book in sessions to match your timetable</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="register-box">
                    <div class="register-text">
                        <img src="{{asset('edecx/website/assets/img/r-03.png')}}">
                        <h4>3. Teach! Enjoy helping students progress</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="register-box">
                    <div class="register-text">
                        <img src="{{asset('edecx/website/assets/img/r-04.png')}}">
                        <h4>4. Get paid straight into your bank account</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/register -->
<!-- review team -->
<section class="section popular-courses pt-100">
    <div class="container">
        <div class="section-header text-center">
            <h2>Join an Incredible Team</h2>
            <p class="sub-title">Become a member of the Kuwait fast growing community of tutors.</p>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{asset('edecx/website/assets/img/user.png')}}">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="">Meera Asodariya</a></h3>
                        <div class="author-info">
                            <div class="author-name">
                                Maths & English Tutor
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="author-country">
                            <p class="mb-0">After looking at a lot of tutoring companies, we found the reviews and ease of use on Tutorful miles ahead of the others.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{asset('edecx/website/assets/img/user.png')}}">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="">Meera Asodariya</a></h3>
                        <div class="author-info">
                            <div class="author-name">
                                Maths & English Tutor
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="author-country">
                            <p class="mb-0">After looking at a lot of tutoring companies, we found the reviews and ease of use on Tutorful miles ahead of the others.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{asset('edecx/website/assets/img/user.png')}}">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="">Meera Asodariya</a></h3>
                        <div class="author-info">
                            <div class="author-name">
                                Maths & English Tutor
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="author-country">
                            <p class="mb-0">After looking at a lot of tutoring companies, we found the reviews and ease of use on Tutorful miles ahead of the others.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{asset('edecx/website/assets/img/user.png')}}">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="">Meera Asodariya</a></h3>
                        <div class="author-info">
                            <div class="author-name">
                                Maths & English Tutor
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="author-country">
                            <p class="mb-0">After looking at a lot of tutoring companies, we found the reviews and ease of use on Tutorful miles ahead of the others.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{asset('edecx/website/assets/img/user.png')}}">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="">Meera Asodariya</a></h3>
                        <div class="author-info">
                            <div class="author-name">
                                Maths & English Tutor
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="author-country">
                            <p class="mb-0">After looking at a lot of tutoring companies, we found the reviews and ease of use on Tutorful miles ahead of the others.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{asset('edecx/website/assets/img/user.png')}}">
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="">Meera Asodariya</a></h3>
                        <div class="author-info">
                            <div class="author-name">
                                Maths & English Tutor
                            </div>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="author-country">
                            <p class="mb-0">After looking at a lot of tutoring companies, we found the reviews and ease of use on Tutorful miles ahead of the others.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Statistics Section -->
<section class="section statistics-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>500+</span>
                    <h3>Happy Clients</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>120+</span>
                    <h3>Online Appointments</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>100%</span>
                    <h3>Job Satisfaction</h3>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
