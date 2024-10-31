@extends('website.layouts.app')
@section('edecx')

<section class="section section-search banner register-banner">
    <div class="container">
        <div class="banner-wrapper m-auto text-center">
            <div class="banner-header">
                <h1>Change Password</h1>
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
                    <h3>Change Password</h3>
                </div>
                <form action="">
                    <div class="form-group">
                        <label class="form-control-label">New Password</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Confirm Password</label>
                        <input type="text" class="form-control">
                    </div>
                    <a href="" class="btn btn-primary login-btn" type="button">Submit</a>
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


