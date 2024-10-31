<?php echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{ $title }}</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('edecx/admin/images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('edecx/admin/css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('edecx/admin/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('edecx/admin/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('edecx/admin/css/responsive.css')}}">
   </head>
   <body>
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container bg-white mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <?php if ($admin->login_logo == '' || $admin->login_logo == NULL) { ?>
                                    <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/logo.png')))) }}" alt="profile-pic">
                           <?php  } else { ?>
                                        @if(file_exists(public_path('edecx/admin/admin-profile/'.$admin->login_logo)))
                                            <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/admin-profile/'.$admin->login_logo)))) }}" >
                                        @else
                                             <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/logo.png')))) }}" alt="profile-pic">
                                        @endif
                            <?php } ?>
                            {{--  <img src="{{asset('edecx/admin/images/logo-1.png')}}">  --}}
                            @include('edecx-admin.flash-message')
                           <form method="POST" action="{{ route($loginRoute) }}"
                            class="mt-4">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control mb-0" id="exampleInputEmail1" name="email" placeholder="Enter email" value="{{ old('email')}}"/>
                                     @if($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control mb-0" id="exampleInputPassword1" name='password' placeholder="Password" value="{{ old('password')}}"/>
                                     @if ($errors->has('password'))
									    <span class="error">{{ $errors->first('password') }}</span>
								    @endif
                                </div>
                                <div class="d-inline-block w-100">
                                    {{--  <div class="custom-control custom-checkbox  d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1" value="1" {{ old('remember') !== null ? 'checked' : '' }} >
                                        <label class="custom-control-label" for="customCheck1" >
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>  --}}
                                    <button type="submit" class="btn btn-primary float-right">Sign in</button>
                                </div>
                                @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#">

                            </a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <?php if ($admin->login_sideimage == '' || $admin->login_sideimage == NULL) { ?>
                                        <img src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/login-sidebar.png')))) }}" class="img-fluid mb-4" alt="profile-pic">
                               <?php  } else { ?>
                                            @if(file_exists(public_path('edecx/admin/admin-profile/'.$admin->login_sideimage)))
                                                <img class="img-fluid mb-4" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/admin-profile/'.$admin->login_sideimage)))) }}" >
                                            @else
                                                 <img class="img-fluid mb-4" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/login-sidebar.png')))) }}" alt="profile-pic">
                                            @endif
                                <?php } ?>
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{asset('edecx/admin/js/jquery.min.js')}}"></script>
      <script src="{{asset('edecx/admin/js/popper.min.js')}}"></script>
      <script src="{{asset('edecx/admin/js/bootstrap.min.js')}}"></script>
      <!-- Appear JavaScript -->
      <script src="{{asset('edecx/admin/js/jquery.appear.js')}}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{asset('edecx/admin/js/countdown.min.js')}}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{asset('edecx/admin/js/waypoints.min.js')}}"></script>
      <script src="{{asset('edecx/admin/js/jquery.counterup.min.js')}}"></script>
      <!-- Wow JavaScript -->
      <script src="{{asset('edecx/admin/js/wow.min.js')}}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{asset('edecx/admin/js/apexcharts.js')}}"></script>
      <!-- Slick JavaScript -->
      <script src="{{asset('edecx/admin/js/slick.min.js')}}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{asset('edecx/admin/js/select2.min.js')}}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{asset('edecx/admin/js/owl.carousel.min.js')}}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{asset('edecx/admin/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{asset('edecx/admin/js/smooth-scrollbar.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{asset('edecx/admin/js/chart-custom.js')}}"></script>
      <!-- Custom JavaScript -->
      <script src="{{asset('edecx/admin/js/custom.js')}}"></script>
   </body>
</html>
