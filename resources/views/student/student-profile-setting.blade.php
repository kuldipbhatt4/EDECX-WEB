@extends('student.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
       <div class="profile-sidebar">
           @include('student.partials.sidebar')
       </div>
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('flash-message')
    <div class="card">
        <div class="card-body">
            <!-- Profile Settings Form -->
            @foreach($studentdetails as $studentdetail)
            <?php $selectedname = $studentdetail['sid']; ?>
                    @foreach($student as $students)
                      @if($selectedname == $students['id'])
            <form method="POST" action="{{ action('Website\Student\Auth\StudentProfileController@updatestudentprofile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $selectedname }}" name="studentdetailid">
                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal Details</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Qualification</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Location</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row">
                                    <div class="col-12 col-md-12">
                                        <?php
                                        if ($studentdetail->student_image == '' || $studentdetail->student_image == NULL) { ?>
                                       <div class="form-group row align-items-center">
                                          <div class="change-avatar">
                                             <div class="profile-img">
                                                <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                                <div class="p-image">
                                                  <i class="ri-pencil-line upload-button"></i>
                                                  <input class="file-upload" type="file" accept="image/*" name="student_image"/>
                                               </div>
                                             </div>
                                          </div>
                                       </div>
                                       <?php  } else {
                                        $path = 'edecx/website/student-profile/';
                                        ?>
                                            @if(!is_dir($path))
                                                mkdir($path, 0755, true);
                                            @endif
                                              <div class="form-group row align-items-center">
                                                <div class="change-avatar">
                                                   <div class="profile-img">
                                                    @if(file_exists(public_path($path.$studentdetail->student_image)))
                                                        <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path($path.$studentdetail->student_image)))) }}" height="150" width="150">
                                                    @else
                                                    <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                                    @endif
                                                      <div class="p-image">
                                                        <i class="ri-pencil-line upload-button"></i>
                                                    <input type="file" class="file-upload profile-pic" name="student_image"
                                                    aria-describedby="student_image" value="{{$studentdetail->student_image}}">
                                                     </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <?php } ?>
                                    </div>
                                      <div class="col-12 col-md-4">
                                          <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" value="{{ $students->fname }}" name="fname">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                          <label>Middle Name</label>
                                          <input type="text" class="form-control" value="{{ $students->middle_name }}" name="middle_name">
                                      </div>
                                    </div>
                                      <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" value="{{ $students->lname }}" name="lname">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <input type="email" class="form-control" value="{{ $students->email }}" name="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div class="cal-icon">
                                                <input type="text" class="form-control datetimepicker" value="{{ Carbon\Carbon::parse($students->student_dob)->format('d-m-Y') }}" name="student_dob" id="student_dob">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control select" id="gender" name="gender">
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" value="{{ $students['mobile_no'] }}" class="form-control" name="mobile_no" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Work Number</label>
                                            <input type="text" value="{{ $students['work_no'] }}" class="form-control" name="work_no" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" value="{{ $students['phone_no'] }}" class="form-control" name="phone_no" >
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label for="about">About Me</label>
                                        <textarea id="default" name="aboutme" placeholder="Enter Content">
                                            {{ $studentdetail['aboutme'] }}
                                        </textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="submit-section">
                                            <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"><button type="submit" class="btn btn-primary submit-btn">Next Tabs</button></a>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Levels</label>
                                            <select id="lid" class="form-control select" multiple="multiple" name="level[]">
                                                <?php $selectedlevel = $students['level'];
                                                $selectedlevel = explode(",", $students->level);
                                                ?>
                                                @foreach($level as $levels)
                                                    <option value="{{ $levels['id'] }}" {{ (in_array($levels['id'], $selectedlevel)) ? 'selected' : '' }}>{{ $levels['level'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Subjects</label>
                                            <select id="sid" class="form-control select" multiple="multiple" name="subject[]">
                                                <?php $selectedsubject = $students['subject'];
                                                $selected = explode(",", $students->subject);
                                                ?>
                                                @foreach($subject as $tutorsubject)
                                                    <option value="{{ $tutorsubject['id'] }}" {{ (in_array($tutorsubject['id'], $selected)) ? 'selected' : '' }}>{{ $tutorsubject['subject_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Type Of Class:</label>
                                            <select id="classid" class="form-control select" multiple="multiple" name="classid[]">
                                                <?php
                                                    $selectedclass = $studentdetail['classid'];
                                                    $selectedclass = explode(",", $studentdetail->classid);
                                                ?>
                                                @foreach($tclass as $tutortype)
                                                    <option value="{{ $tutortype['id'] }}" {{ (in_array($tutortype['id'], $selectedclass)) ? 'selected' : '' }}>{!!  $tutortype['classtype'] !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="submit-section">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><button type="submit" class="btn btn-primary submit-btn">Next Tabs</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                        <label>Address</label>
                                            <input type="text" class="form-control" value="{{ $students->address }}" name="address">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                        <label>Street Address</label>
                                            <input type="text" class="form-control" value="{{ $students->street_address }}" name="street_address">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                        <label>Landmark</label>
                                            <input type="text" class="form-control" value="{{ $students->street_address_line2 }}" name="street_address_line2">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" value="{{ $students->city }}" name="city">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" value="{{ $students->state }}" name="state">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input type="text" class="form-control" value="{{ $students->zipcode }}" name="zipcode">
                                        </div>
                                    </div>
                                    {{--  <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control" value="United States">
                                        </div>
                                    </div>  --}}
                                    <div class="col-12">
                                        <div class="submit-section">
                                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
            @endforeach
        @endforeach
            <!-- /Profile Settings Form -->
        </div>
    </div>
</div>
@endsection
@section('page-js-script')
<script src="https://cdn.tiny.cloud/1/sfasipfcvis2mt1c96reicg34lzureeic1v2wyf3sm6fered/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#default',
        menubar: false,
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#classid').multiselect({
            includeSelectAllOption: true
        });

        $('#classid-visible').on('click', function() {
            $('#classid').multiselect('selectAll', true);
        });
        $('#classid-all').on('click', function() {
            $('#classid').multiselect('selectAll', false);
        });

        //Subject
        $('#sid').multiselect({
            includeSelectAllOption: true
        });

        $('#sid-visible').on('click', function() {
            $('#sid').multiselect('selectAll', true);
        });
        $('#sid-all').on('click', function() {
            $('#sid').multiselect('selectAll', false);
        });

        //Level
        $('#lid').multiselect({
            includeSelectAllOption: true
        });

        $('#lid-visible').on('click', function() {
            $('#lid').multiselect('selectAll', true);
        });
        $('#lid-all').on('click', function() {
            $('#lid').multiselect('selectAll', false);
        });

        $('#student_dob').datetimepicker({
            format : 'yyyy-mm-dd'
        });
    });
</script>
@endsection


