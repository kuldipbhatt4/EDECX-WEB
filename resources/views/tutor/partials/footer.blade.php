<!-- Footer Top -->
<div class="footer-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- Footer Widget -->
                <div class="footer-widget footer-about">
                    <div class="footer-logo">
                        <img src="{{asset('edecx/website/assets/img/logo.png')}}" alt="logo">
                    </div>
                    <div class="footer-about-content">
                        @foreach ($footer as $wfooterr)
                        <p>{{ $wfooterr->fabout }} </p>
                        @endforeach
                        @foreach ($footerlinks as $footerl)
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="https://{{ $footerl->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                </li>
                                <li>
                                    <a href="https://{{ $footerl->twitter }}" target="_blank"><i class="fab fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a href="http://{{ $footerl->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="https://{{ $footerl->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                    </div>
                </div>
                <!-- /Footer Widget -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Footer Widget -->
                <div class="footer-widget footer-menu">
                    <h2 class="footer-title">For Tutors</h2>
                    <ul class="footer-nav">
                        <li><a href="#">Appointments</a></li>
                        <li class="{{ (request()->is('tutor/tutorbooking')) ? 'active' : '' }}">
                            <a href="{{url('/tutor/tutorbooking')}}">Booking</a>
                        </li>
                        @if (Auth::guard('tutors')->check())
                            <li><a href="{{ route ('tutor.logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{url('/tutor/login')}}">Login</a></li>
                        @endif
                        <li class="{{ (request()->is('tutor/tutor-dashboard')) ? 'active' : '' }}">
                            <a href="{{url('/tutor/tutor-dashboard')}}">Tutor Dashboard</a>
                        </li>
                    </ul>
                </div>
                <!-- /Footer Widget -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Footer Widget -->
                <div class="footer-widget footer-menu">
                    <h2 class="footer-title">Quick Links</h2>
                    <ul class="footer-nav">
                        <li class="{{ (request()->is('/about-us')) ? 'active' : '' }}">
                            <a href="{{url('/about-us')}}">About Us</a>
                        </li>
                        <li class="{{ (request()->is('/contact-us')) ? 'active' : '' }}">
                            <a href="{{url('/contact-us')}}">Contact Us</a>
                        </li>
                        <li class="{{ (request()->is('/student/student-faq')) ? 'active' : '' }}">
                            <a href="{{url('/student/student-faq')}}">Student Faq</a>
                        </li>
                        <li class="{{ (request()->is('/tutor/tutor-faq')) ? 'active' : '' }}">
                            <a href="{{url('/tutor/tutor-faq')}}">Tutor Faq</a>
                        </li>
                    </ul>
                </div>
                <!-- /Footer Widget -->
            </div>
            <div class="col-lg-3 col-md-6">
                @foreach ($footer as $wfooter)
                <!-- Footer Widget -->
                <div class="footer-widget footer-contact">
                    <h2 class="footer-title">Contact Us</h2>
                    <div class="footer-contact-info">
                        <div class="footer-address">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>   {{ $wfooter->address }} </p>
                        </div>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            {{ $wfooter->contactno }}
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-envelope"></i>
                            {{ $wfooter->emailid }}
                        </p>
                    </div>
                    @endforeach
                </div>
                <!-- /Footer Widget -->
            </div>
        </div>
    </div>
</div>
<!-- /Footer Top -->
<div class="footer-bottom">
    <div class="container-fluid">
        <!-- Copyright -->
        <div class="copyright">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="copyright-text">
                        <p class="mb-0">&copy; 2020 <a href="#">EDECX</a>. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-right">
                    <ul>
                        <li><a href="{{ url('terms-conditions/') }}" target="_blank">Terms And Conditions</a></li>
                        <li><a href="{{ url('privacy-policy/') }}" target="_blank">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Copyright -->
    </div>
</div>
