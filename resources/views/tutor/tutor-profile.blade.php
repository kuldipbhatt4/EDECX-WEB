@extends('tutor.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    @include('tutor.partials.sidebar')
</div>
<div class="content">
    <div class="container">
        <!-- Mentor Widget -->
        @if (!$tutordetails->isEmpty() )
        @foreach($tutordetails as $tutordetail)
        <?php $selectedname = $tutordetail['tid']; ?>
                @foreach($tutor as $tutors)
                  @if($selectedname == $tutors['id'])
        <div class="card col-10 mr-auto ml-auto p-0">
            <div class="card-body">
                <div class="mentor-widget">
                    <div class="user-info-left align-items-center">
                        <div class="mentor-img d-flex flex-wrap justify-content-center">
                            <?php
                            if ($tutordetail->tutor_image == '' || $tutordetail->tutor_image == NULL) { ?>
                           <div class="form-group row align-items-center">
                              <div class="change-avatar">
                                 <div class="profile-img">
                                    <img class="profile-pic" src="{{asset('edecx/admin/default/default.jpg')}}" alt="profile-pic">
                                 </div>
                              </div>
                           </div>
                           <?php  } else { ?>
                                  <div class="form-group row align-items-center">
                                    <div class="change-avatar">
                                       <div class="profile-img">
                                        @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))
                                            <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))) }}" height="150" width="150">
                                        @else
                                             <img class="profile-pic" src="{{asset('edecx/admin/default/default.jpg')}}" alt="profile-pic">
                                        @endif
                                       </div>
                                    </div>
                                 </div>
                                 <?php } ?>
                        </div>
                        </div>
                        <div class="user-info-cont">
                            <h4 class="usr-name">{{ $tutors->tutors_fname }} {{ $tutors->tutors_lname }}</h4>
                            <p class="mentor-type">Subject :
                                <?php $selectedsubject = $tutordetail['sid'];
                                $selected = explode(",", $tutordetail->sid);
                                ?>
                                @foreach($subject as $tutorsubject)
                                    {{ (in_array($tutorsubject['id'], $selected)) ? $tutorsubject['subject_name'] : '' }}
                                @endforeach
                            </p>
                            <div class="mentor-details m-0">
                                <p class="user-location m-0"><i class="fas fa-map-marker-alt"></i>   {{ $tutordetail->city }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="user-info-right d-flex align-items-end flex-wrap">
                        <div class="hireme-btn text-center">
                            <a class="blue-btn-radius" href="{{ url('/tutor/profile-setting') }}">Edit Profile</a>
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
                                    <p>{!! $tutordetail->description !!}</p>
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
                                            @if($tutordetail->gender == '0')
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
                                            {{ Carbon\Carbon::parse($tutordetail->tutor_dob)->format('d-m-Y') }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Experience</span>
                                        <div class="row-result">
                                            @if ($tutordetail->experience == '10')
                                                {{ $tutordetail->experience }}+
                                            @else
                                                {{ $tutordetail->experience }}
                                            @endif
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
                <!-- Personal Details -->
                <div class="widget education-widget mb-0">
                    <h4 class="widget-title">My Subjects</h4>
                    <hr/>
                    <div class="experience-box">
                        <ul class="experience-list profile-custom-list">
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Subject</span>
                                        <div class="row-result">
                                            <?php $selectedsubject = $tutordetail['sid'];
                                            $selected = explode(",", $tutordetail->sid);
                                            ?>
                                            @foreach($subject as $tutorsubject)
                                                {{ (in_array($tutorsubject['id'], $selected)) ? $tutorsubject['subject_name'] : '' }}
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
                                            <?php $selectedlevel = $tutordetail['lid'];
                                            $selectedlevel = explode(",", $tutordetail->lid);
                                            ?>
                                            @foreach($level as $levels)
                                             {{ (in_array($levels['id'], $selectedlevel)) ? $levels['level'] : '' }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Class Type</span>
                                        <div class="row-result">
                                            <?php $selectedclass = $tutordetail['classid'];
                                            $selectedclass = explode(",", $tutordetail->classid);
                                            ?>
                                            @foreach($tclass as $tutortype)
                                            {{ (in_array($tutortype['id'], $selectedclass)) ? $tutortype['classtype'] : '' }}
                                            <br/>
                                            @endforeach
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
                                        <span>Undergraduate College</span>
                                        <div class="row-result">{{ $tutordetail->ugra_college }}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Undergraduate Major</span>
                                        <div class="row-result">{{ $tutordetail->gra_college }}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Graduate College</span>
                                        <div class="row-result">{{ $tutordetail->ugra_major }}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>Type of Degree</span>
                                        <div class="row-result">{{ $tutordetail->typedegree }}</div>
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
                                            {{ $tutors['address'] }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <span>City</span>
                                        <div class="row-result">{{ $tutordetail['city'] }}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Location Details -->
            </div>
        </div>
        <!-- /Mentor Details Tab -->
        @endif
        @endforeach
    @endforeach
    @else
    <div class="alert alert-danger" role="alert">
        Your Account is not Activated. Please contact <a href="">Edecx</a>
    </div>
    @endif
    </div>
</div>
@endsection
