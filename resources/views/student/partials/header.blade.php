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
            <a href="{{ url('student/student-dashboard') }}" class="navbar-brand logo">
                <img src="{{asset('edecx/website/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ url('student/student-dashboard') }}" class="menu-logo">
                    <img src="{{asset('edecx/website/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="{{ (request()->is('student/student-dashboard')) ? 'active' : '' }}">
                    <a href="{{ url('student/student-dashboard') }}">Dashboard</a>
                </li>
                <li class="{{ (request()->is('student/find-tutor')) ? 'active' : '' }}">
                    <a href="{{ url('find-tutor') }}">Find Tutor</a>
                </li>
                <!-- <li class="{{ (request()->is('student/repeat-tutor-list')) ? 'active' : '' }}">
                    <a href="{{ url('student/repeat-tutor-list') }}">Request Tutor</a>
                </li> -->
                <li class="{{ (request()->is('student/student-faq')) ? 'active' : '' }}">
                    <a href="{{ url('student/student-faq') }}">FAQ</a>
                </li>
                <li>
                    <a class="disabled">Start Class</a>
                </li>

            </ul>
        </div>
        <ul class="nav header-navbar-rht">
            <!-- User Menu -->
            @if (!empty($studentdetails))
@foreach($studentdetails as $studentdetail)
<?php $selectedname = $studentdetail['sid']; ?>
            <li class="nav-item dropdown has-arrow logged-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img">
                        <?php
                        if ($studentdetail->student_image == '' || $studentdetail->student_image == NULL) { ?>
                       <div class="form-group">
                          <div class="change-avatar">

                                <img class="avatar-sm rounded-circle" src="{{asset('edecx/admin/images/user/11.png')}}" alt="profile-pic">

                          </div>
                       </div>
                       <?php  } else { ?>
                                    @if(file_exists(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))
                                        <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))) }}" >
                                    @else
                                         <img class="avatar-img rounded-circle" src="{{asset('edecx/admin/images/user/11.png')}}" alt="profile-pic">
                                    @endif

                             <?php } ?>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <?php
                            if ($studentdetail->student_image == '' || $studentdetail->student_image == NULL) { ?>
                           <div class="form-group">
                              <div class="change-avatar">
                                    <img class="avatar-sm rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                              </div>
                           </div>
                           <?php  } else { ?>
                                        @if(file_exists(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))
                                            <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))) }}" width="31" >
                                        @else
                                             <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                        @endif

                                 <?php } ?>
                        </div>
                        <div class="user-text">
                            <h6>{{ Auth::guard('students')->user()->fname }} {{ Auth::guard('students')->user()->lname }}</h6>
                            <p class="text-muted mb-0">Student</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{ url('student/student-profile-setting') }}">Profile Settings</a>
                    <a class="dropdown-item" href="{{ url('/student/change-pwd') }}">Change Password</a>
                    <a class="dropdown-item" href="{{ route('student.logout') }}">Logout</a>
                </div>
            </li>
            @endforeach
            @endif
            <!-- /User Menu -->
        </ul>
    </nav>
</div>
