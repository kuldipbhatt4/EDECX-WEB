@extends('tutor.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    @include('tutor.partials.sidebar')
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
    @include('flash-message')
    <div class="card">
        <div class="card-body warning-class">
            @if (!$tutordetails->isEmpty() )
            @foreach($tutordetails as $tutordetail)
            <?php $selectedname = $tutordetail['tid']; ?>
                    @foreach($tutor as $tutors)
                      @if($selectedname == $tutors['id'])
            <form method="POST" action="{{ action('Website\Tutor\TutorProfileController@updatetutorprofile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" value="<?php echo $tutordetail['id']; ?>" name="tdetailid"/>
                <input type="hidden" value="<?php echo $tutors['id']; ?>" name="tutorid"/>
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
                                <li class="nav-item">
                                    <a class="nav-link" id="hourly-tab" data-toggle="tab" href="#hourly" role="tab" aria-controls="hourly" aria-selected="false">Hourly Rate</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <?php
                                            if ($tutordetail->tutor_image == '' || $tutordetail->tutor_image == NULL) { ?>
                                           <div class="form-group row align-items-center">
                                              <div class="change-avatar">
                                                 <div class="profile-img">
                                                    <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                                    <div class="p-image">
                                                      <i class="ri-pencil-line upload-button"></i>
                                                      <input class="file-upload" type="file" accept="image/*" name="tutor_image"/>
                                                   </div>
                                                 </div>
                                              </div>
                                           </div>
                                           <?php  } else { ?>
                                                  <div class="form-group row align-items-center">
                                                    <div class="change-avatar">
                                                       <div class="profile-img">
                                                        @if(file_exists(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))
                                                            <img  class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/website/tutor-profile/'.$tutordetail->tutor_image)))) }}" height="50" width="50">
                                                        @else
                                                             <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                                        @endif
                                                          <div class="p-image">
                                                            <i class="ri-pencil-line upload-button"></i>
                                                        <input type="file" class="file-upload" name="tutor_image"
                                                        aria-describedby="tutor_image" value="{{$tutordetail->tutor_image}}">
                                                         </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <?php } ?>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                    <input type="text" class="form-control" name="tutors_fname" value="{{ $tutors->tutors_fname }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                    <input type="text" class="form-control" name="tutors_lname" value="{{ $tutors->tutors_lname }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control select" id="gender" name="gender">
                                                    <option {{old('gender',$tutordetail->gender)=="0"? 'selected':''}} value="0">Male</option>
                                                    <option {{old('gender',$tutordetail->gender)=="1"? 'selected':''}} value="1">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="cal-icon">
                                                    <input type="text" id="tutor_dob" class="form-control datetimepicker" name="tutor_dob"
                                                     value="{{ Carbon\Carbon::parse($tutordetail->tutor_dob)->format('d-m-Y') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="email" disabled class="form-control" name="email" value="{{ $tutors->tutor_email}}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" value="{{ $tutors->contact_no }}" name="contact_no" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Levels</label>
                                                <select id="lid" class="form-control select" multiple="multiple" name="lid[]">
                                                    <?php $selectedlevel = $tutordetail['lid'];
                                                    $selectedlevel = explode(",", $tutordetail->lid);
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
                                                <select id="sid" class="form-control select" multiple="multiple" name="sid[]">
                                                    <?php $selectedsubject = $tutordetail['sid'];
                                                    $selected = explode(",", $tutordetail->sid);
                                                    ?>
                                                    @foreach($subject as $tutorsubject)
                                                        <option value="{{ $tutorsubject['id'] }}" {{ (in_array($tutorsubject['id'], $selected)) ? 'selected' : '' }}>{{ $tutorsubject['subject_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Teaching Experience:</label>
                                                <select class="form-control select" name="experience">
                                                    <option {{old('experience',$tutordetail->experience)=="0"? 'selected':''}} value="0">0</option>
                                                    <option {{old('experience',$tutordetail->experience)=="1"? 'selected':''}} value="1">1</option>
                                                    <option {{old('experience',$tutordetail->experience)=="2"? 'selected':''}} value="2">2</option>
                                                    <option {{old('experience',$tutordetail->experience)=="3"? 'selected':''}} value="3">3</option>
                                                    <option {{old('experience',$tutordetail->experience)=="4"? 'selected':''}} value="4">4</option>
                                                    <option {{old('experience',$tutordetail->experience)=="5"? 'selected':''}} value="5">5</option>
                                                    <option {{old('experience',$tutordetail->experience)=="6"? 'selected':''}} value="6">6</option>
                                                    <option {{old('experience',$tutordetail->experience)=="7"? 'selected':''}} value="7">7</option>
                                                    <option {{old('experience',$tutordetail->experience)=="8"? 'selected':''}} value="8">8</option>
                                                    <option {{old('experience',$tutordetail->experience)=="9"? 'selected':''}} value="9">9</option>
                                                    <option {{old('experience',$tutordetail->experience)=="10"? 'selected':''}} value="10+">10+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Type Of Class:</label>
                                                <select id="classid" class="form-control select" multiple="multiple" name="classid[]">
                                                    <?php
                                                        $selectedclass = $tutordetail['classid'];
                                                        $selectedclass = explode(",", $tutordetail->classid);
                                                    ?>
                                                    @foreach($tclass as $tutortype)
                                                        <option value="{{ $tutortype['id'] }}" {{ (in_array($tutortype['id'], $selectedclass)) ? 'selected' : '' }}>{!! $tutortype['classtype'] !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <label for="about">About Me</label>
                                            <textarea id="default" name="description" placeholder="Enter Content">
                                                {{ $tutordetail['description'] }}
                                            </textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="submit-section">
                                                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"><button type="submit" class="btn btn-primary submit-btn">Next</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                            <label>Undergraduate College</label>
                                                <input type="text" class="form-control" value="{{ $tutordetail['ugra_college'] }}" name="ugra_college">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Graduate College</label>
                                                <input type="text" class="form-control" value="{{ $tutordetail['gra_college'] }}" name="gra_college">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Undergraduate Major</label>
                                                <input type="text" class="form-control" value="{{ $tutordetail['ugra_major'] }}" name="ugra_major">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Graduate Major</label>
                                                <input type="text" class="form-control" value="{{ $tutordetail['gra_major'] }}" name="gra_major">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Type of Degree</label>
                                                <input type="text" class="form-control" value="{{ $tutordetail['typedegree'] }}" name="typedegree">
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
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label>Address</label>
                                                <input type="text" class="form-control" value="{{ $tutors->address }}" name="address">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" value="{{ $tutordetail['city'] }}" name="city">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="submit-section">
                                                <a class="nav-link" id="hourly-tab" data-toggle="tab" href="#hourly" role="tab" aria-controls="hourly" aria-selected="false"><button type="submit" class="btn btn-primary submit-btn">Next Tabs</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="hourly" role="tabpanel" aria-labelledby="hourly-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="set-rate">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>({{env('CURRENCY_SIGN')}})Set your hourly rate</label>
                                                            <input type="text" id="hrprice" class="form-control" value="{{ $tutordetail['hrprice'] }}"  name="hrprice" onkeyup="myFunction()">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>({{env('CURRENCY_SIGN')}})Your earnings (After admin commission)</label>
                                                            @foreach($admin as $admins)
                                                              <input type="hidden" id="price" class="form-control mb-3" value="{{ $admins['price'] }}">
                                                            @endforeach
                                                            <input type="text" id="urearning" name="urearning" class="form-control" value="{{ $tutordetail['urearning'] }}"  readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="submit-section">
                                                <button type="submit" class="btn btn-primary submit-btn" id="udpate">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
            <!-- /Profile Settings Form -->
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

        var earning;
        earning =  $('#urearning').val();
        $('#urearning').val('$'+earning);

            var hrprice;
            var price
            hrprice = parseInt($('#hrprice').val());
            price = parseInt($('#price').val());
            var urearning = hrprice - price;
            urearning = (urearning > 0 ? urearning : 0);
            if (!isNaN(urearning)) {
                $('#urearning').val(''+urearning.toFixed(2));
            }else{
                $('#urearning').val('0.00');
            }

        // Calculation for Hourly Price
        $('#hrprice').keyup(function()
        {
            var hrprice;
            var price
            hrprice = parseInt($('#hrprice').val());
            price = parseInt($('#price').val());
            var urearning = hrprice - price;
            urearning = (urearning > 0 ? urearning : 0);
            if (!isNaN(urearning)) {
                $('#urearning').val(''+urearning.toFixed(2));
            }else{
                $('#urearning').val('0.00');
            }
        });
        // Calculation for Hourly Price Ends

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

        $('#tutor_dob').datetimepicker({
            format : 'yyyy-mm-dd'
        });
    });
</script>
@endsection
