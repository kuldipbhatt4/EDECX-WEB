@extends('website.layouts.app')
@section('edecx')
<section class="section section-search banner register-banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Register</h1>
            </div>
        </div>
    </div>
</section>
    <div class="content inn_padding">
        <!-- Register Content -->
        <div class="account-content">
            <div class="account-box">
                <div class="login-right">
                    <div class="login-header">
                        <h3><span>Student</span> Register</h3>
                        <p class="text-muted">Access to our dashboard</p>
                    </div>
                    @include('flash-message')
                    <form action="{{ action('Website\Student\Auth\RegisterController@postRegister') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">First Name<span class="error">*</span></label>
                                    <input id="first-name" type="text" class="form-control" name="fname" autofocus="" value="{{ old('fname') }}">
                                </div>
                                @if($errors->has('fname'))
                                    <span class="error">{{ $errors->first('fname') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Middle Name<span class="error">*</span></label>
                                    <input id="middle-name" type="text" class="form-control" name="middle_name" autofocus="" value="{{ old('middle_name') }}">
                                </div>
                                @if($errors->has('middle_name'))
                                    <span class="error">{{ $errors->first('middle_name') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Last Name<span class="error">*</span></label>
                                    <input id="last-name" type="text" class="form-control" name="lname" value="{{ old('lname') }}">
                                </div>
                                @if($errors->has('lname'))
                                    <span class="error">{{ $errors->first('lname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email Address<span class="error">*</span></label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                @if($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Password<span class="error">*</span></label>
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Confirm Password<span class="error">*</span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}">
                                    </div>
                                    @if($errors->has('confirm_password'))
                                        <span class="error">{{ $errors->first('confirm_password') }}</span>
                                    @endif
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Birth Date<span class="error">*</span></label>
                                        <input type="text" id="student_dob" class="form-control datetimepicker" name="student_dob" >
                                    </div>
                                    @if($errors->has('student_dob'))
                                         <span class="error">{{ $errors->first('student_dob') }}</span>
                                    @endif
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gender<span class="error">*</span></label>
                                    <select class="form-control" id="gender" name="gender" >
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                      </select>
                                </div>
                                @if($errors->has('gender'))
                                     <span class="error">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Address<span class="error">*</span></label>
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                                </div>
                                @if($errors->has('address'))
                                     <span class="error">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Street Address<span class="error">*</span></label>
                                    <input id="street_address" type="text" class="form-control" name="street_address" value="{{ old('street_address') }}">
                                </div>
                                @if($errors->has('street_address'))
                                     <span class="error">{{ $errors->first('street_address') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Landmark<span class="error">*</span></label>
                                    <input id="street_address_line2" type="text" class="form-control" name="street_address_line2" value="{{ old('street_address_line2') }}">
                                </div>
                                @if($errors->has('street_address_line2'))
                                     <span class="error">{{ $errors->first('street_address_line2') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">City<span class="error">*</span></label>
                                    <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">
                                </div>
                                @if($errors->has('city'))
                                    <span class="error">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">State<span class="error">*</span></label>
                                    <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">
                                </div>
                                @if($errors->has('state'))
                                    <span class="error">{{ $errors->first('state') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">ZipCode<span class="error">*</span></label>
                                    <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}">
                                </div>
                                @if($errors->has('zipcode'))
                                    <span class="error">{{ $errors->first('zipcode') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile Number<span class="error">*</span></label>
                                    <input id="mobile_no" type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}">
                                </div>
                                @if($errors->has('mobile_no'))
                                    <span class="error">{{ $errors->first('mobile_no') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Phone Number<span class="error">*</span></label>
                                    <input id="phone_no" type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}">
                                </div>
                                @if($errors->has('phone_no'))
                                    <span class="error">{{ $errors->first('phone_no') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Work Number<span class="error">*</span></label>
                                    <input id="work_no" type="text" class="form-control" name="work_no" value="{{ old('work_no') }}">
                                </div>
                                @if($errors->has('work_no'))
                                    <span class="error">{{ $errors->first('work_no') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Subjects<span class="error">*</span></label>
                                    <select id="subject" class="form-control select" multiple="multiple" name="subject[]" >
                                    @foreach($subject as $tutorsubject)
                                        <option value="{{ $tutorsubject['id'] }}">
                                            {{ $tutorsubject['subject_name'] }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                @if($errors->has('subject'))
                                    <span class="error">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label>Levels<span class="error">*</span></label>
                                    <select id="level" class="form-control select" multiple="multiple" name="level[]">
                                    @foreach($level as $levels)
                                        <option value="{{ $levels['id'] }}">{{ $levels['level'] }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @if($errors->has('level'))
                                     <span class="error">{{ $errors->first('level') }}</span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="agreeCheckboxUser" id="agree_checkbox_user">
                                <label class="custom-control-label" for="agree_checkbox_user"><span class="error">*</span>I agree to Student</label>
                                <a href="{{ url('privacy-policy/') }}" class="blue" target="_blank">Privacy Policy</a> And <a tabindex="-1" href="{{ url('terms-conditions/') }}" class="blue" target="_blank"> T&C</a>
                            </div>
                            @if($errors->has('agreeCheckboxUser'))
                                 <span class="error">{{ $errors->first('agreeCheckboxUser') }}</span>
                            @endif
                        </div>
                        <button class="btn btn-primary login-btn" type="submit" id="btnSubmit">Create Account</button>
                        <div class="account-footer text-center mt-3">
                            Already have an account? <a class="forgot-link mb-0"
                            href="{{ url('student/login/') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<section class="section statistics-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>500+</span>
                    <h3>Happy Clients</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>120+</span>
                    <h3>Online Appointments</h3>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="statistics-list text-center">
                    <span>100%</span>
                    <h3>Job Satisfaction</h3>
                </div>
            </div>
        </div>
    </div>
</section>
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
        //Class
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
        $('#subject').multiselect({
            includeSelectAllOption: true
        });

        $('#subject-visible').on('click', function() {
            $('#subject').multiselect('selectAll', true);
        });
        $('#subject-all').on('click', function() {
            $('#subject').multiselect('selectAll', false);
        });

        //Level
        $('#level').multiselect({
            includeSelectAllOption: true
        });

        $('#level-visible').on('click', function() {
            $('#level').multiselect('selectAll', true);
        });
        $('#level-all').on('click', function() {
            $('#level').multiselect('selectAll', false);
        });

        $('.datetimepicker').datetimepicker({
            format : 'DD/MM/Y'
        });
    });
</script>

@endsection
