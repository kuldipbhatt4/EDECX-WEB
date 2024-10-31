@extends('website.layouts.app')
@section('edecx')
<section class="section section-search">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Search Tutor And Schedule Lecture</h1>
                <p>Discover the best Mentors the city nearest to you.</p>
            </div>
            <div class="search-box">
                <a href="{{ url('find-tutor') }}" class="btn btn_find">Find A Tutor</a>
            </div>
        </div>
    </div>
</section>
<!-- /Home Banner -->
<section class="section how-it-works">
    <div class="container">
        <div class="section-header text-center">
            <h2>How does it works ?</h2>
            <p class="sub-title">Are you looking to join online institutions? Now i is very simple, Sign up with mentoring</p>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box text-center">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <span class="circle"></span>
                            <i><img src="{{asset('edecx/website/assets/img/icon-1.png')}}" alt=""></i>
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">Find the right tutor for you</div>
                        </div>
                    </div>
                    <p class="mb-0">Only the best and brightest tutors can join our team. Message them for free to quickly find your ideal match.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box text-center">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <span class="circle"></span>
                            <i><img src="{{asset('edecx/website/assets/img/icon-2.png')}}" alt=""></i>
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">Collaborate</div>
                        </div>
                    </div>
                    <p class="mb-0">Read reviews from thousands of other parents and students to find a tutor who best meets your needs.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box text-center">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <span class="circle"></span>
                            <i><img src="{{asset('edecx/website/assets/img/icon-3.png')}}" alt=""></i>
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">feedback</div>
                        </div>
                    </div>
                    <p class="mb-0">After your lessons, you will be able to to leave feedback on your tutor, helping everyone find the right help</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section popular-courses">
    <div class="container">
        <div class="section-header text-center">
            <h2>Student and tutors Review</h2>
            <p class="sub-title">But do not take our word for it, see what students and tutors who use our site have said</p>
        </div>
        <div class="owl-carousel owl-theme">
            <div class="course-box">
                <div class="product">
                    <div class="product-img">
                        <img alt="" src="{{ asset('edecx/website/assets/img/user.png') }}">
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
                        <img src="{{asset('edecx/website/assets/img/user.png')}}" alt="">
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
<!-- Path section start -->
<section class="section path-section">
    <div class="section-header text-center">
        <div class="container">
            <span>Choose the</span>
            <h2>Different All Learning Paths</h2>
            <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        </div>
    </div>
    <div class="learning-path-col">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img1.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>Maths</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img2.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>science</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img3.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>English</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img4.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>Chemistry</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img5.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>Physics</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img1.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>Maths</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img2.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>English</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="large-col">
                        <a href="" class="large-col-image">
                            <div class="image-col-merge">
                                <img src="{{asset('edecx/website/assets/img/path-img3.jpg')}}" alt="">
                                <div class="text-col">
                                    <h5>spanish</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="view-all text-center"><a href="" class="btn btn-primary">View All</a></div>
        </div>
    </div>
</section>
<!-- Path section end -->
<section class="zigzag">
    <h2>Find your tutor today... its simple!</h2>
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="image-01">
                <img src="{{ asset('assets/img/01.png') }}">
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="images-text">
                <h3>It all begins with that initial search. Browse thousands of student-rated tutors.</h3>
                <p>First tell us what subjects you're interested in and if you want to learn online, from the comfort of your own home or face-to-face. You can then compare tutors, read learner reviews and message them for free, allowing you to make the right choice with confidence.</p>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="images-text">
                <h3>It all begins with that initial search. Browse thousands of student-rated tutors.</h3>
                <p>First tell us what subjects you're interested in and if you want to learn online, from the comfort of your own home or face-to-face. You can then compare tutors, read learner reviews and message them for free, allowing you to make the right choice with confidence.</p>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="image-01">
                <img src="{{ url('assets/img/02.png') }}">
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="image-01">
                <img src="{{ url('assets/img/03.png') }}">
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="images-text">
                <h3>It all begins with that initial search. Browse thousands of student-rated tutors.</h3>
                <p>First tell us what subjects you are interested in and if you want to learn online, from the comfort of your own home or face-to-face. You can then compare tutors, read learner reviews and message them for free, allowing you to make the right choice with confidence.</p>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="section section-blogs">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="video-image">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/eZ6aOvvsd6E" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="video-text">
                    <h2>Keep your family’s tuition on track <span>with Tutorful</span></h2>
                    <p>Learning online means there’s no need to travel to your sessions and you have access to the best tutors from all around the country from the comfort of your home.</p>
                    <a href="{{ url('about-us') }}" class="btn btn-round">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Blog Section -->
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
