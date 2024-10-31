@extends('tutor.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <!-- Sidebar -->
           @include('tutor.partials.sidebar')
    <!-- /Sidebar -->
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
<!-- /Home Banner -->
<section class="login-page">
    <div class="account-content">
        <div class="account-box">
            <div class="login-right">
                <div class="login-header">
                    <h3>Change Password</h3>
                </div>
                <form action="{{ action('Website\Tutor\Auth\LoginController@updateoldpwd') }}" method="POST" >
                    {{ csrf_field() }}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Old Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        @if($errors->has('password'))
                           <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">New Password</label>
                            <input type="password" name="newpassword" class="form-control">
                        </div>
                        @if($errors->has('newpassword'))
                             <span class="error">{{ $errors->first('newpassword') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control">
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
