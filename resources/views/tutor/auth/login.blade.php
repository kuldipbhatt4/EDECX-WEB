@extends('website.layouts.app')
@section('edecx')
<section class="section section-search banner register-banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Tutor Login </h1>
            </div>
        </div>
    </div>
</section>
<section class="login-page">
    <div class="account-content">
        <div class="account-box">
            <div class="login-right">
                <div class="login-header">
                    <h3>Login As Tutor </h3>
                </div>
                @include('flash-message')
				<form action="{{ action('Website\Tutor\Auth\LoginController@postLogintutor') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Email Address<span class="error">*</span></label>
                            <input type="email" class="form-control" name="tutor_email" value="{{ old('tutor_email') }}" @if ($errors->has('tutor_email')) autofocus="" @endif>
                        </div>
                        @if($errors->has('tutor_email'))
                          <span class="error">{{ $errors->first('tutor_email') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Password<span class="error">*</span></label>
                            <div class="pass-group">
                                <input type="password" class="form-control pass-input" name="password" value="{{ old('password') }}" @if ($errors->has('password')) autofocus="" @endif>
                                <span class="fas fa-eye toggle-password" ></span>
                            </div>
                        </div>
                        @if($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                   <div class="text-right">
                       <a class="forgot-link" href="{{ url('tutor/forgot-password') }}">Forgot Password ?</a>
                   </div>
                   <button type="submit" class="btn btn-primary w-100" id="btnSubmit">Sign in</button>
                   <div class="text-center dont-have">Don’t have an account? <a href="{{ url('tutor/register/') }}">Register</a></div>
               </form>
            </div>
        </div>
    </div>
</section>
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
<script>
$(document).ready(function() {
    $('#btnSubmit').click(function(e) {
        var isValid = true;
        $('input').each(function() {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red"
                });
            }
            else {
                $(this).css({
                    "border": ""
                });
            }
        });
        if (isValid == false)
            e.preventDefault();
    });
});
</script>
@endsection
