@if (!empty($tutordetails))
@foreach($tutordetails as $tutordetail)
<?php $selectedname = $tutordetail['tid']; ?>
<div class="header-fixed">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ url ('tutor/tutor-dashboard') }}" class="navbar-brand logo">
                <img src="{{asset('edecx/website/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ url ('tutor/tutor-dashboard') }}" class="menu-logo">
                    <img src="{{asset('edecx/website/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="{{ (request()->is('tutor/tutor-dashboard')) ? 'active' : '' }}">
                    <a href="{{ url('tutor/tutor-dashboard') }}">Dashboard</a>
                </li>
                <li class="{{ (request()->is('tutor/student-request')) ? 'active' : '' }}">
                    <a href="{{ url('tutor/student-request') }}">Student booking Request</a>
                </li>
                <li class="{{ (request()->is('tutor/tutor-faq')) ? 'active' : '' }}">
                    <a href="{{ url('tutor/tutor-faq') }}">FAQ</a>
                </li>
                <li>
                    <a class="disabled">Start Class</a>
                </li>
            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="avatar avatar-sm" style="line-height: 0;">
                        <?php
                        if ($tutordetail->tutor_image == '' || $tutordetail->tutor_image == NULL) { ?>
                       <div class="form-group">
                          <div class="change-avatar">
                                <img class="avatar-sm rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                          </div>
                       </div>
                       <?php  } else { ?>
                                    @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))
                                        <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))) }}" >
                                    @else
                                         <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                    @endif

                             <?php } ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <?php
                            if ($tutordetail->tutor_image == '' || $tutordetail->tutor_image == NULL) { ?>
                           <div class="form-group">
                              <div class="change-avatar">
                                    <img class="avatar-sm rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                              </div>
                           </div>
                           <?php  } else { ?>
                                  <div class="form-group">
                                    <div class="change-avatar">

                                        @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))
                                            <img class="avatar-sm rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))) }}" >
                                        @else
                                             <img class="avatar-sm rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                        @endif

                                    </div>
                                 </div>
                                 <?php } ?>
                        </div>
                        <div class="user-text">
                            <h6>{{ Auth::guard('tutors')->user()->tutors_fname }} {{ Auth::guard('tutors')->user()->tutors_lname }}</h6>
                            <p class="text-muted mb-0">Tutor</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ url('tutor/profile-setting') }}">Profile Settings</a>
                    <a class="dropdown-item" href="{{ url('tutor/change-pwd') }}">Change Password</a>
                    <a class="dropdown-item" href="{{ route('tutor.logout') }}">Logout</a>
                </div>
            </li>
            <!-- /User Menu -->
        </ul>
    </nav>
</div>
@endforeach
@endif
