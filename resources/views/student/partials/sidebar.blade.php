@if (!$studentdetails->isEmpty())
@foreach($studentdetails as $studentdetail)
<?php $selectedname = $studentdetail['sid']; ?>
<div class="user-widget">
    <div class="pro-avatar">
        <?php
        if ($studentdetail->student_image == '' || $studentdetail->student_image == NULL) { ?>
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
                     @if(file_exists(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))
                         <img class="avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))) }}" height="25" width="25">
                     @else
                          <img class="profile-pic avatar-img rounded-circle" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                     @endif
                   </div>
                </div>
              </div>
              <?php } ?>
    </div>
    <div class="user-info-cont">
        <h4 class="usr-name">{{ Auth::guard('students')->user()->fname }} {{ Auth::guard('students')->user()->lname }}</h4>
    </div>
</div>
@endforeach
@endif
<div class="custom-sidebar-nav">
    <ul>
        <li class="{{ (request()->is('student/student-dashboard')) ? 'active' : '' }}">
            <a href="{{ url('student/student-dashboard') }}" class="active"><i class="fas fa-home"></i>Dashboard <span><i class="fas fa-chevron-right"></i></span></a>
        </li>
        <li class="{{ (request()->is('student/booking')) ? 'active' : '' }}">
            <a href="{{ url('student/booking') }}"><i class="fas fa-clock"></i>Pending Bookings <span><i class="fas fa-chevron-right"></i></span></a>
        </li>
        <!-- <li class="{{ (request()->is('student/repeat-tutor-list')) ? 'active' : '' }}">
            <a href="{{ url('student/repeat-tutor-list') }}"><i class="fas fa-comments"></i>Repeat Tutor List<span><i class="fas fa-chevron-right"></i></span></a>
        </li> -->
        <li class="{{ (request()->is('student/order-history')) ? 'active' : '' }}">
            <a href="{{ url('student/order-history') }}"><i class="fas fa-star"></i>Order History<span><i class="fas fa-chevron-right"></i></span></a>
        </li>
        <li class="{{ (request()->is('student/student-profile-setting') || request()->is('student/student-profile') ) ? 'active' : '' }}">
            <a href="{{ url('student/student-profile') }}"><i class="fas fa-user-cog"></i>Profile <span><i class="fas fa-chevron-right"></i></span></a>
        </li>
        <li class="{{ (request()->is('student/my-given-review')) ? 'active' : '' }}">
            <a href="{{ url('student/my-given-review') }}"><i class="fas fa-sign-out-alt"></i>My Given review<span><i class="fas fa-chevron-right"></i></span></a>
        </li>
        <li class="{{ (request()->is('student/my-wallet')) ? 'active' : '' }}">
            <a href="{{ url('student/my-wallet') }}"><i class="fas fa-sign-out-alt"></i>My Wallet<span><i class="fas fa-chevron-right"></i></span></a>
        </li>
        <li>
            <a href="{{ route('student.logout') }}"><i class="fas fa-sign-out-alt"></i>Logout <span><i class="fas fa-chevron-right"></i></span></a>
        </li>
    </ul>
</div>
