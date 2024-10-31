@extends('website.layouts.app')
@section('edecx')

<section class="section section-search banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>The Best Online Learning Classroom</h1>
                <p>Expert one-to-one help, wherever you are, with online tutoring.</p>
            </div>
        </div>
    </div>
</section>
<!-- /Home Banner -->
<section class="section how-it-works online-tutor-sec">
    <div class="container">
        <div class="section-header text-center">
            <h2>How Online Tuition Works</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box text-center">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <span class="circle"></span>
                            <i><img src="{{asset('edecx/website/assets/img/tutor.png')}}" alt=""></i>
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">Select the best tutors</div>
                        </div>
                    </div>
                    <p class="mb-0">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box text-center">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <span class="circle"></span>
                            <i><img src="{{asset('edecx/website/assets/img/calendar.png')}}" alt=""></i>
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">Schedule Time And Date</div>
                        </div>
                    </div>
                    <p class="mb-0">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box text-center">
                    <div class="feature-header">
                        <div class="feature-icon">
                            <span class="circle"></span>
                            <i><img src="{{asset('edecx/website/assets/img/lesson.png')}}" alt=""></i>
                        </div>
                        <div class="feature-cont">
                            <div class="feature-text">Learn Lessons</div>
                        </div>
                    </div>
                    <p class="mb-0">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!---powerful learning-->
<section class="section powerful-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>A Powerful Learning Experience...</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="powrful_box">
                    <h2>(1) 1-TO-1 LEARNING</h2>
                    <p>See and speak to your tutor live through your webcam.</p>
                </div>
                <div class="powrful_box mb-0">
                    <h2>(2) SHARED DOCUMENTS</h2>
                    <p>Share past papers, essays or documents with your tutor.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="powrful-image">
                    <img src="{{asset('edecx/website/assets/img/laptop.png')}}" alt="laptop">
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="powrful_box">
                    <h2>(1) 1-TO-1 LEARNING</h2>
                    <p>See and speak to your tutor live through your webcam.</p>
                </div>
                <div class="powrful_box mb-0">
                    <h2>(2) SHARED DOCUMENTS</h2>
                    <p>Share past papers, essays or documents with your tutor.</p>
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
                        <a href="#" class="large-col-image">
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
<!-- Blog Section -->
<section class="section section-blogs online-tutor">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="video-image">
                    <img src="{{asset('edecx/website/assets/img/student.jpg')}}" alt="student">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="video-text">
                    <h2>our expert online tutors</h2>
                    <p>With a huge choice of tutors and access to our feature-packed online classroom, online tuition can help you achieve the results you’re looking for. Learning online means that you don't have to travel to sessions, so can easily fit lessons around your current studies and schedule. This means that you can have online lessons during your free time and even take lessons with experts who live in different parts of the country.</p>
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
