@extends('tutor.layouts.app')
@section('edecx')
<div class="content">
    <div class="container">
        <div class="card col-10 mr-auto ml-auto p-0">
            <div class="card-body">
            @if ($studentdetails != '')
                @foreach($studentdetails as $studentdetail)
                    <?php $selectedname = $studentdetail['sid']; ?>
                        @foreach($student as $students)
                            @if($selectedname == $students['id'])
                                <div class="mentor-widget">
                                    <div class="user-info-left align-items-center">
                                        <div class="mentor-img d-flex flex-wrap justify-content-center">
                                            <div class="pro-avatar">
                                                <?php
                                                if ($studentdetail->student_image == '' || $studentdetail->student_image == NULL) { ?>
                                                    <img src="{{asset('edecx/admin/default/default.jpg')}}" alt="profile-pic">
                                                <?php } else { ?>
                                                    @if(file_exists(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))
                                                            <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/student-profile/'.$studentdetail->student_image)))) }}" height="150" width="150">
                                                        @else
                                                            <img class="profile-pic" src="{{asset('edecx/admin/default/default.jpg')}}" alt="profile-pic">
                                                        @endif
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="user-info-cont">
                                            <h4 class="usr-name">{{ $students->fname }} {{ $students->lname }}</h4>
                                            <div class="mentor-details m-0">
                                                <p class="user-location m-0"><i class="fas fa-map-marker-alt"></i>  {{ $students->city }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>
                                </div>
                                <!-- /Mentor Widget -->
                                <!-- Mentor Details Tab -->
                                <div class="card col-10 mr-auto ml-auto p-0">
                                    <div class="card-body custom-border-card pb-0">
                                        <!-- Tab Content -->
                                        <div class="tab-content pt-0">
                                            <!-- Biography Content -->
                                            <div role="tabpanel" id="biography" class="tab-pane fade show active">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- About Details -->
                                                        <div class="widget about-widget custom-about mb-0">
                                                            <h4 class="widget-title">About Me</h4>
                                                            <hr/>
                                                            <p>{!! $studentdetail->aboutme !!}</p>
                                                        </div>
                                                        <!-- /About Details -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /biography Content -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card col-10 mr-auto ml-auto p-0">
                                    <div class="card-body custom-border-card pb-0">
                                        <!-- Personal Details -->
                                        <div class="widget education-widget mb-0">
                                            <h4 class="widget-title">Personal Details</h4>
                                            <hr/>
                                            <div class="experience-box">
                                                <ul class="experience-list profile-custom-list">
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Gender</span>
                                                                <div class="row-result">
                                                                    @if($students->gender == '0')
                                                                    Male
                                                                @else
                                                                    Female
                                                                @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Date of Birth</span>
                                                                <div class="row-result">
                                                                    {{ Carbon\Carbon::parse($students->tutor_dob)->format('d-m-Y') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Preferred Classes</span>
                                                                <div class="row-result">
                                                                    <?php $selectedclass = $studentdetail['classid'];
                                                                    $selectedclass = explode(",", $studentdetail->classid);
                                                                    ?>
                                                                    @foreach($tclass as $studenttype)
                                                                    {!! (in_array($studenttype['id'], $selectedclass)) ? $studenttype['classtype'] : '' !!}
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Mobile Number</span>
                                                                <div class="row-result">
                                                                    {{ $students->mobile_no }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Work Number</span>
                                                                <div class="row-result">
                                                                    {{ $students->phone_no }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Phone Number </span>
                                                                <div class="row-result">
                                                                    {{ $students->work_no }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Personal Details -->
                                    </div>
                                </div>
                                <div class="card col-10 mr-auto ml-auto p-0">
                                    <div class="card-body custom-border-card pb-0">
                                        <!-- Qualification Details -->
                                        <div class="widget experience-widget mb-0">
                                            <h4 class="widget-title">Qualification</h4>
                                            <hr/>
                                            <div class="experience-box">
                                                <ul class="experience-list profile-custom-list">
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Subject :</span>
                                                                <div class="row-result">
                                                                        <?php $selectedsubject = $students['subject'];
                                                                        $selected = explode(",", $students->subject);
                                                                        ?>
                                                                        @foreach($subject as $studentsubject)
                                                                            {{ (in_array($studentsubject['id'], $selected)) ? $studentsubject['subject_name'] : '' }}
                                                                        @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Level</span>
                                                                <div class="row-result">
                                                                    <?php $selectedlevel = $students['level'];
                                                                    $selectedlevel = explode(",", $students->level);
                                                                    ?>
                                                                    @foreach($level as $levels)
                                                                    {{ (in_array($levels['id'], $selectedlevel)) ? $levels['level'] : '' }}
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Qualification Details -->
                                    </div>
                                </div>
                                <div class="card col-10 mr-auto ml-auto p-0">
                                    <div class="card-body custom-border-card pb-0">
                                        <!-- Location Details -->
                                        <div class="widget awards-widget m-0">
                                            <h4 class="widget-title">Location</h4>
                                            <hr/>
                                            <div class="experience-box">
                                                <ul class="experience-list profile-custom-list">
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Address 1</span>
                                                                <div class="row-result">
                                                                    {{ $students->address }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Address 2</span>
                                                                <div class="row-result">
                                                                    {{ $students->street_address }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Country</span>
                                                                <div class="row-result">
                                                                    {{ $students->street_address_line2 }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>City</span>
                                                                <div class="row-result">
                                                                    {{ $students->city }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>State</span>
                                                                <div class="row-result">
                                                                    {{ $students->state }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <span>Postal Code</span>
                                                                <div class="row-result">
                                                                    {{ $students->zipcode }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Location Details -->
                                        <!-- /Mentor Details Tab -->
                            @endif
                        @endforeach
                @endforeach
            @else
            <!-- <div class="alert alert-danger" role="alert">
               Sorry! No user found
            </div> -->
            <div class=" col-md-10 mr-auto ml-auto p-0">
                <div class="">
                    <div class="mentor-widget">
                        <div class="user-info-left align-items-center">
                            Sorry! No any user found.                    
                        </div>
                    </div>
                </div>
            </div>
            @endif
            </div>
        </div>
        <!-- /Mentor Details Tab -->
    </div>
</div>
@endsection
