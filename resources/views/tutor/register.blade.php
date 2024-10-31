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
        <div class="account-content">
            <div class="account-box">
                <div class="login-right">
                    <div class="login-header">
                        <h3><span>Tutor</span> Register</h3>
                    </div>
                    @include('flash-message')
                    <form action="{{ action('Website\Tutor\Auth\RegisterTutorController@postTutorRegister') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">First Name<span class="error">*</span></label>
                                    <input id="first-name" type="text" class="form-control" name="tutors_fname" autofocus="">
                                </div>
                                @if($errors->has('tutors_fname'))
                                     <span class="error">{{ $errors->first('tutors_fname') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last Name<span class="error">*</span></label>
                                    <input id="last-name" type="text" class="form-control" name="tutors_lname">
                                </div>
                                @if($errors->has('tutors_lname'))
                                     <span class="error">{{ $errors->first('tutors_lname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Email Address<span class="error">*</span></label>
                            <input id="email" type="email" class="form-control" name="tutor_email">
                        </div>
                        @if($errors->has('tutor_email'))
                            <span class="error">{{ $errors->first('tutor_email') }}</span>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password<span class="error">*</span></label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                                @if($errors->has('password'))
                                  <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Confirm Password<span class="error">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <span class="error">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Contact Number<span class="error">*</span></label>
                            <input id="contact_no" type="text" class="form-control" name="contact_no">
                        </div>
                        @if($errors->has('contact_no'))
                            <span class="error">{{ $errors->first('contact_no') }}</span>
                        @endif
                        <div class="form-group">
                            <label class="form-control-label">Address<span class="error">*</span></label>
                            <input id="address" type="textarea" class="form-control" name="address">
                        </div>
                        @if($errors->has('address'))
                              <span class="error">{{ $errors->first('address') }}</span>
                         @endif
                        <div class="form-group">
                            <label class="form-control-label">Upload Resume<span class="error">*</span></label>
                            <input id="resume" type="file" class="form-control" name="resume">
                        </div>
                        @if($errors->has('resume'))
                            <span class="error">{{ $errors->first('resume') }}</span>
                        @endif
                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="agreeCheckboxUser" id="agree_checkbox_user">
                                <label class="custom-control-label" for="agree_checkbox_user"><span class="error">*</span>I agree to Tutor </label>
                                <a href="{{ url('privacy-policy/') }}" class="blue" target="_blank">Privacy Policy</a> And <a tabindex="-1" href="{{ url('terms-conditions/') }}" class="blue" target="_blank"> T&C</a>
                            </div>
                        </div>
                        <button class="btn btn-primary login-btn" type="submit">Create Account</button>
                        <div class="account-footer text-center mt-3">
                            Already have an account? <a class="forgot-link mb-0" href="{{ url('tutor/login') }}">Login</a>
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
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key={{env('GOOGLE_MAP_KEY')}}" type="text/javascript"></script>


<script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('address');
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>