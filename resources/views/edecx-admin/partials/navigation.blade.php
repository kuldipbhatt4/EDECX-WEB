 <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="#" onclick="window.location='{{ url('edecx-admin/dashboard') }}'" >
       <img src="{{asset('edecx/admin/images/logo.png')}}" class="img-fluid" alt="edecx-logo">
       <span>edecx</span>
       </a>
       <div class="iq-menu-bt-sidebar">
             <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                   <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                   <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                </div>
             </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="{{ (request()->is('edecx-admin/dashboard')) ? 'active' : '' }}">
                <a href="{{url('edecx-admin/dashboard')}}" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
             </li>
             <li class="{{ (request()->is('edecx-admin/student/student-list')) ? 'active' : '' }}">
                <a href="#studentbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-group-line"></i><span>Student</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="studentbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li class="{{ (request()->is('edecx-admin/student/student-list')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/student/student-list')}}"><i class="ri-inbox-line"></i>Student list</a>
                    </li>
                </ul>
             </li>
             <li class="{{ (request()->is('edecx-admin/tutor/tutor-approved-list')) ? 'active' : '' }} {{ (request()->is('edecx-admin/tutor/tutor-denied-list')) ? 'active' : '' }} ">
                <a href="#tutorbox" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-user-2-line"></i><span>Tutor</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="tutorbox" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class="{{ (request()->is('edecx-admin/tutor/tutor-approved-list')) ? 'active' : '' }}">
                        <a href="{{url('edecx-admin/tutor/tutor-approved-list')}}"><i class="ri-inbox-line"></i>Tutors Approved List</a>
                    </li>
                    <li class="{{ (request()->is('edecx-admin/tutor/tutor-denied-list')) ? 'active' : '' }}">
                        <a href="{{url('edecx-admin/tutor/tutor-denied-list')}}"><i class="ri-inbox-line"></i>Tutors Denied List</a>
                    </li>
                </ul>
             </li>
             <li class="{{ (request()->is('edecx-admin/subject/index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/subject/create')) ? 'active' : '' }} ">
                <a href="#subject" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-book-3-line"></i><span>Subject</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="subject" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li class="{{ (request()->is('edecx-admin/subject/index')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/subject/index')}}"><i class="ri-inbox-line"></i>Subject List</a>
                    </li>
                   <li class="{{ (request()->is('edecx-admin/subject/create')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/subject/create')}}"><i class="ri-edit-line"></i>Create Subject</a>
                    </li>
                </ul>
             </li>
             <li class="{{ (request()->is('edecx-admin/level/index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/level/create')) ? 'active' : '' }} ">
                <a href="#level" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-bookmark-3-line"></i><span>Level</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li class="{{ (request()->is('edecx-admin/level/index')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/level/index')}}"><i class="ri-inbox-line"></i>Level List</a>
                    </li>
                   <li class="{{ (request()->is('edecx-admin/level/create')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/level/create')}}"><i class="ri-edit-line"></i>Create Level</a>
                    </li>
                </ul>
             </li>
             <li class="{{ (request()->is('edecx-admin/location/index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/location/create')) ? 'active' : '' }} ">
                <a href="#location" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-map-pin-2-line"></i><span>Location</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="location" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li class="{{ (request()->is('edecx-admin/location/index')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/location/index')}}"><i class="ri-inbox-line"></i>Locations List</a>
                    </li>
                   <li class="{{ (request()->is('edecx-admin/location/create')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/location/create')}}"><i class="ri-edit-line"></i>Create Location</a>
                    </li>
                </ul>
             </li>
             <li class="{{ (request()->is('edecx-admin/pages/about-us')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/contact-us')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/about-us')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/create-faq')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/term/term-index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/term/create-term')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/policy/policy-index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/policy/create-policy')) ? 'active' : '' }}">
                <a href="#pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line"></i><span>pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   {{--  <li class="{{ (request()->is('edecx-admin/pages/about-us')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/pages/about-us')}}"><i class="ri-inbox-line"></i>About Us</a>
                    </li>  --}}
                   <li class="{{ (request()->is('edecx-admin/pages/contact-us')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/pages/contact-us')}}"><i class="ri-edit-line"></i>Contact Us</a>
                    </li>
                    <li class="{{ (request()->is('edecx-admin/pages/contact-us')) ? 'active' : '' }}">
                        <a href="{{url('edecx-admin/pages/inquiry-email')}}"><i class="ri-edit-line"></i>Inquiry Email</a>
                     </li>
                   {{--  <li class="{{ (request()->is('edecx-admin/pages/create-faq')) ? 'active' : '' }}">
                       <a href="{{url('edecx-admin/pages/create-faq')}}"><i class="ri-edit-line"></i>FAQ</a>
                    </li>  --}}
                    <li>
                        <ul>
                            <li class="{{ (request()->is('edecx-admin/pages/faq/faq-index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/faq/create-faq')) ? 'active' : '' }}">
                            <a href="#sub-menu-faq" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>FAQ</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="sub-menu-faq" class="iq-submenu iq-submenu-data collapse">
                                <li class="{{ (request()->is('edecx-admin/pages/faq/faq-index')) ? 'active' : '' }}">
                                    <a href="{{url('edecx-admin/pages/faq/faq-index')}}"><i class="ri-record-circle-line"></i>FAQ List</a>
                                    </li>
                                <li class="{{ (request()->is('edecx-admin/pages/faq/create-faq')) ? 'active' : '' }}">
                                    <a href="{{url('edecx-admin/pages/faq/create-faq')}}"><i class="ri-record-circle-line" ></i>Create FAQ</a>
                                    </li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li class="{{ (request()->is('edecx-admin/pages/term/term-index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/term/create-term')) ? 'active' : '' }}">
                            <a href="#sub-menu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>T&C</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="sub-menu" class="iq-submenu iq-submenu-data collapse">
                                <li class="{{ (request()->is('edecx-admin/pages/term/term-index')) ? 'active' : '' }}">
                                    <a href="{{url('edecx-admin/pages/term/term-index')}}"><i class="ri-record-circle-line"></i>Terms List</a>
                                    </li>
                                <li class="{{ (request()->is('edecx-admin/pages/term/create-term')) ? 'active' : '' }}">
                                    <a href="{{url('edecx-admin/pages/term/create-term')}}"><i class="ri-record-circle-line" ></i>Create T&C</a>
                                    </li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li class="{{ (request()->is('edecx-admin/pages/policy/policy-index')) ? 'active' : '' }} {{ (request()->is('edecx-admin/pages/policy/create-policy')) ? 'active' : '' }} ">
                            <a href="#policy" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>Privacy Policy</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="policy" class="iq-submenu iq-submenu-data collapse">
                                <li>
                                    <a href="{{url('edecx-admin/pages/policy/policy-index')}}"><i class="ri-record-circle-line"></i>Privacy List</a>
                                </li>
                                <li>
                                    <a href="{{url('edecx-admin/pages/policy/create-policy')}}"><i class="ri-record-circle-line"></i>Create Privacy Policy</a>
                                </li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
             </li>
             <li class="{{ (request()->is('edecx-admin/orderhistory/student*')) || (request()->is('edecx-admin/orderhistory/tutor*')) ? 'active' : '' }} ">
                <a href="#order" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="fa fa-history"></i><span>Order History</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="order" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <ul>
                    <li class="{{ (request()->is('edecx-admin/orderhistory/student/pending')) ? 'active' : '' }} {{ (request()->is('edecx-admin/orderhistory/student/complete')) ? 'active' : '' }} ">
                       <a href="#sub-menu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-history"></i><span>Student</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                       <ul id="sub-menu" class="iq-submenu iq-submenu-data collapse">
                          <li class="{{ (request()->is('edecx-admin/orderhistory/student/pending')) ? 'active' : '' }}">
                              <a href="{{url('edecx-admin/orderhistory/student/pending')}}"><i class="ri-record-circle-line"></i>Pendding</a>
                            </li>
                          <li class="{{ (request()->is('edecx-admin/orderhistory/student/complete')) ? 'active' : '' }} ">
                              <a href="{{url('edecx-admin/orderhistory/student/complete')}}"><i class="fa fa-history"></i>Complete</a>
                            </li>
                       </ul>
                    </li>
                  </ul>
                   <ul>
                    <li class=" {{ (request()->is('edecx-admin/orderhistory/tutor/pending')) ? 'active' : '' }} {{ (request()->is('edecx-admin/orderhistory/tutor/complete')) ? 'active' : '' }}">
                       <a href="#pending" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-history"></i><span>Tutor</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                       <ul id="pending" class="iq-submenu iq-submenu-data collapse">
                          <li class=" {{ (request()->is('edecx-admin/orderhistory/tutor/pending')) ? 'active' : '' }} ">
                              <a href="{{url('edecx-admin/orderhistory/tutor/pending')}}"><i class="fa fa-history"></i>Pending</a>
                            </li>
                          <li class=" {{ (request()->is('edecx-admin/orderhistory/tutor/complete')) ? 'active' : '' }} " >
                              <a href="{{url('edecx-admin/orderhistory/tutor/complete')}} "><i class="ri-record-circle-line"></i>Complete</a>
                            </li>
                       </ul>
                    </li>
                  </ul>
                </ul>
             </li>
          </ul>
       </nav>
       <div class="p-3"></div>
    </div>
 </div>
 <!-- TOP Nav Bar -->
 <div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <div class="iq-sidebar-logo">
          <div class="top-logo">
             <a href="{{ url('edecx-admin/dashboard') }}" class="logo">
             <img src="{{asset('edecx/admin/images/logo.png')}}" class="img-fluid" alt="">
             <span>edecx</span>
             </a>
          </div>
       </div>
       <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="navbar-left">
            <div class="iq-search-bar">
                <h3>edecx Admin Panel</h3>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
          <i class="ri-menu-3-line"></i>
          </button>
          <div class="iq-menu-bt align-self-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
             </div>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

          </div>
          @if(Auth::guard('admins')->check())

          <ul class="navbar-list">
              <li>
                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">

                    <?php
                    $profile_image = Auth::guard('admins')->user()->profile_image;

                    if ($profile_image == '' || $profile_image == NULL) { ?>

                   <img src="{{asset('edecx/admin/images/user/1.jpg')}}" class="img-fluid rounded mr-3" alt="user">
                   <?php  } else { ?>
                    <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/admin-profile/'.$profile_image)))) }}" class="img-fluid rounded mr-3">
                    <?php } ?>

                   <div class="caption">
                   <h6 class="mb-0 line-height text-white">{{ Auth::guard('admins')->user()->fname }} {{ Auth::guard('admins')->user()->lname }}</h6>
                   </div>
                </a>
                <div class="iq-sub-dropdown iq-user-dropdown">
                   <div class="iq-card shadow-none m-0">
                      <div class="iq-card-body p-0 ">
                          <div class="bg-primary p-3">
                            <h5 class="mb-0 text-white line-height"></h5>
                         </div>
                         <a href="{{ url('/edecx-admin/setting/profile-edit') }}" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                               <div class="rounded iq-card-icon iq-bg-primary">
                                  <i class="ri-profile-line"></i>
                               </div>
                               <div class="media-body ml-3">
                                  <h6 class="mb-0 ">Edit Profile</h6>
                                  <p class="mb-0 font-size-12">Modify your personal details.</p>
                               </div>
                            </div>
                         </a>
                         <a href="{{ url ('/edecx-admin/setting/account-setting') }}" class="iq-sub-card iq-bg-primary-hover">
                            <div class="media align-items-center">
                               <div class="rounded iq-card-icon iq-bg-primary">
                                  <i class="ri-account-box-line"></i>
                               </div>
                               <div class="media-body ml-3">
                                  <h6 class="mb-0 ">Account settings</h6>
                                  <p class="mb-0 font-size-12">Manage your account parameters.</p>
                               </div>
                            </div>
                         </a>
                         <div class="d-inline-block w-100 text-center p-3">
                            <a class="bg-primary iq-sign-btn" href="{{action('Admin\Auth\LoginController@logout')}}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                         </div>
                      </div>
                   </div>
                </div>
             </li>
          </ul>
          @endif
       </nav>
    </div>
 </div>
