@extends('website.layouts.app')
@section('edecx')

<section class="section section-search banner register-banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Login Your Account</h1>
            </div>
        </div>
    </div>
</section>
<!-- /Home Banner -->
<section class="login-page">
    <div class="account-content">
        <div class="account-box">
            <div class="login-right">
                <div class="login-header">
                    <h3>Student Login </h3>
                    <p class="text-muted">Access to our dashboard</p>
                </div>
                <form action="" >
                    {{-- {{ csrf_field() }} --}}
                    <div class="form-group">
                        <label class="form-control-label">Email Address</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <div class="pass-group">
                            <input type="password" class="form-control pass-input">
                            <span class="fas fa-eye toggle-password"></span>
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                    </div>
                    <a href="/student/dashboard-student" class="btn btn-primary login-btn" type="button">Login</a>
                    <div class="text-center dont-have">Don’t have an account? <a href="/student/register">Register</a></div>
                    <div class="text-center dont-have">Are You a Tutor? <a href="/tutor/tutorlogin">Login Here</a></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Statistics Section -->
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


