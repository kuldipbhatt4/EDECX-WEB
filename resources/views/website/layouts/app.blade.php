<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>EDECX</title>
		<link type="image/x-icon" href="{{asset('edecx/website/assets/img/favicon.png')}}" rel="icon">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/plugins/fontawesome/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('edecx/website/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('edecx/website/assets/css/bootstrap-multiselect.css')}}">
        <link rel="stylesheet" href="{{asset('edecx/website/assets/css/bootstrap-datetimepicker.min.css')}}">
	</head>
	<body>
		<div class="main-wrapper">
			<header class="header">
				@include('website.partials.header')
			</header>

            @yield('edecx')

			<footer class="footer">
                @include('website.partials.footer')
			</footer>
        </div>
		<script src="{{asset('edecx/website/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('edecx/website/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('edecx/website/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('edecx/website/assets/js/jquery.validate.min.js')}}"></script>
		<script src="{{asset('edecx/website/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('edecx/website/assets/js/script.js')}}"></script>
        <script src="{{asset('edecx/website/assets/js/bootstrap-multiselect.js')}}"></script>
        <script src="{{asset('edecx/website/assets/js/moment.min.js')}}"></script>
        <script src="{{asset('edecx/website/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
		<script src="{{asset('edecx/website/assets/plugins/select2/js/select2.min.js')}}"></script>
        @yield('page-js-script')
        <script>
            $("document").ready(function(){
                setTimeout(function(){
                    $("div.alert-success").fadeOut('fast');
                    $("div.alert-danger").fadeOut('fast');
                    $("div.alert-warning").fadeOut('fast');
                    $("div.alert-info").fadeOut('slow');
                }, 1000 );
            });
           </script>
	</body>
</html>
