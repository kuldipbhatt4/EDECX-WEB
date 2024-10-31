@extends('student.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        @include('student.partials.sidebar')
    </div>
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
<section class="login-page">
    <div class="account-content">
        <div class="account-box">
            <div class="login-right">
                <div class="login-header">
                    <h3>Change Password</h3>
                </div>
                @include('flash-message')
                <form method="POST" action="{{ action('Website\Student\ChangePsdStudentController@studentupdateoldpwd') }}" >
                    {{ csrf_field() }}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Old Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        @if($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">New Password</label>
                            <input type="password" class="form-control" name="newpassword">
                        </div>
                        @if($errors->has('newpassword'))
                            <span class="error">{{ $errors->first('newpassword') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmpassword">
                        </div>
                        @if($errors->has('confirmpassword'))
                            <span class="error">{{ $errors->first('confirmpassword') }}</span>
                        @endif
                    </div>
                    <button class="btn btn-primary login-btn" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
</div>
@endsection


