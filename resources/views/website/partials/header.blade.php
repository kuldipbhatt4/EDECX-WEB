<div class="header-fixed">
    <div class="container">
      <nav class="navbar navbar-expand-lg header-nav">
          <div class="navbar-header">
              <a id="mobile_btn" href="javascript:void(0);">
                  <span class="bar-icon">
                      <span></span>
                      <span></span>
                      <span></span>
                  </span>
              </a>
              <a href="{{url('/')}}" class="navbar-brand logo" class="{{ (request()->is('/')) ? 'active' : '' }}">
                  <img src="{{asset('edecx/website/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
              </a>
          </div>
          <div class="main-menu-wrapper">
              <div class="menu-header">
                  <a href="{{url('/')}}" class="menu-logo">
                      <img src="{{asset('edecx/website/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                  </a>
                  <a id="menu_close" class="menu-close" href="javascript:void(0);">
                      <i class="fas fa-times"></i>
                  </a>
              </div>
              <ul class="main-nav">
                @if (Auth::guard('students')->check())
                    <li class="{{ (request()->is('/student/student-dashboard')) ? 'active' : '' }}">
                        <a href="{{ url('student/student-dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ (request()->is('student/find-tutor')) ? 'active' : '' }}">
                        <a href="{{ url('find-tutor') }}">Find Tutor</a>
                    </li>
                @elseif (Auth::guard('tutors')->check())
                    <li class="{{ (request()->is('/tutor/tutor-dashboard')) ? 'active' : '' }}">
                        <a href="{{ url('tutor/tutor-dashboard') }}">Dashboard</a>
                    </li>
                @else
                <a href="{{ url('tutor/tutor-dashboard') }}" style="display:none;">Dashboard</a>
                @endif
                  <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                  <li class="{{ (request()->is('about-us')) ? 'active' : '' }}"><a href="{{url('/about-us')}}">About Us</a></li>
                  <li class="{{ (request()->is('online-tutoring')) ? 'active' : '' }}"><a href="{{url('/online-tutoring')}}">Online Tutoring</a></li>
                  <li class="{{ (request()->is('become-tutor')) ? 'active' : '' }}"><a href="{{url('/become-tutor')}}">Become Tutor</a></li>
                  <li class="{{ (request()->is('contact-us')) ? 'active' : '' }}"><a href="{{url('/contact-us')}}">Contact Us</a></li>
              </ul>
          </div>
          <ul class="nav header-navbar-rht">
            @if (Auth::guard('students')->check())
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('student.logout') }}">Logout</a>
                </li>
            @elseif  (Auth::guard('tutors')->check())
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{url('/tutor/logout')}}">Logout</a>
                </li>
            @else
              <li class="nav-item">
                  <a class="nav-link header-login" href="{{route('student.login') }}">Login</a>
              </li>
            @endif
          </ul>
      </nav>
  </div>
</div>
