<!-- Sidebar -->
<div class="profile-sidebar">
    @if (!$tutordetails->isEmpty())
            @foreach($tutordetails as $tutordetail)
            <?php $selectedname = $tutordetail['tid']; ?>
    <div class="user-widget">
        <div class="pro-avatar">
         <?php
         if ($tutordetail->tutor_image == '' || $tutordetail->tutor_image == NULL) { ?>
        <div class="form-group row align-items-center">
           <div class="change-avatar">
              <div class="profile-img">
                 <img class="profile-pic avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
              </div>
           </div>
        </div>
        <?php  } else { ?>
               <div class="form-group row align-items-center">
                 <div class="col-md-12">
                    <div class="profile-img-edit">
                     @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))
                         <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))) }}" height="25" width="25">
                     @else
                          <img class="profile-pic avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                     @endif
                    </div>
                 </div>
              </div>
              <?php } ?>
            <div class="tutor-rate">
                <h2>{{env('CURRENCY_SIGN')}}{{ $tutordetail['hrprice'] }}/hr</h2>
            </div>
        </div>
        <div class="user-info-cont">

            <h4 class="usr-name">{{ Auth::guard('tutors')->user()->tutors_fname }} {{ Auth::guard('tutors')->user()->tutors_lname }}</h4>
            <p class="mentor-type">{{ $tutordetail['typedegree'] }}</p>
        </div>
    </div>
@endforeach
@endif
    <div class="custom-sidebar-nav">
        <ul>
            <li class="{{ (request()->is('tutor/tutor-dashboard')) ? 'active' : '' }}">
                <a href="{{ url('tutor/tutor-dashboard') }}"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a>
            </li>
            <!-- <li class="{{ (request()->is('tutor/tutorbooking')) ? 'active' : '' }}">
                <a href="{{ url('tutor/tutorbooking') }}"><i class="fas fa-clock"></i>Bookings <span><i class="fas fa-chevron-right"></i></span></a>
            </li> -->
            <li class="{{ (request()->is('tutor/student-request')) ? 'active' : '' }}">
                <a href="{{ url('tutor/student-request') }}"><i class="fas fa-clock"></i>Student booking Request <span><i class="fas fa-chevron-right"></i></span></a>
            </li>             
            <li class="{{ (request()->is('tutor/schedule-timing')) ? 'active' : '' }}">
                <a href="{{ url('tutor/schedule-timing') }}"><i class="fas fa-hourglass-start"></i>Schedule Timings <span><i class="fas fa-chevron-right"></i></span></a>
            </li>
            <li class="{{ (request()->is('tutor/student-list')) ? 'active' : '' }}">
                <a href="{{ url('tutor/student-list') }}"><i class="fas fa-star"></i>Order History<span><i class="fas fa-chevron-right"></i></span></a>
            </li>
            <li class="{{ (request()->is('tutor/profile-setting')     || request()->is('tutor/tutor-profile')) ? 'active' : '' }}">
                <a href="{{ url('tutor/tutor-profile') }}"><i class="fas fa-user-cog"></i>My Profile <span><i class="fas fa-chevron-right"></i></span></a>
            </li>
            <!-- <li class="{{ (request()->is('')) ? 'active' : '' }}">
                <a href="#"><i class="fas fa-user-cog"></i>Account History<span><i class="fas fa-chevron-right"></i></span></a>
            </li> -->            
            <li class="{{ (request()->is('tutor/review')) ? 'active' : '' }}">
                <a href="{{ url('tutor/review') }}"><i class="fas fa-eye"></i>Received Reviews <span><i class="fas fa-chevron-right"></i></span></a>
            </li>
            <li class="{{ (request()->is('tutor/my-wallet')) ? 'active' : '' }}">
                <a href="{{ url('tutor/my-wallet') }}"><i class="fas fa-sign-out-alt"></i>My Wallet<span><i class="fas fa-chevron-right"></i></span></a>
            </li>
            <li>
                <a href="{{ route('tutor.logout') }}"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a>
            </li>
        </ul>
    </div>
</div>
<!-- /Sidebar -->
