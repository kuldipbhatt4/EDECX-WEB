<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <title>EDECX</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<!-- Favicons -->
		<link href="{{asset('edecx/website/assets/img/favicon.png')}}" rel="icon">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('edecx/website/assets/plugins/fontawesome/css/all.min.css')}}">
        <!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('edecx/website/assets/css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('edecx/website/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('edecx/website/assets/css/bootstrap-multiselect.css')}}">
	</head>
	<body>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
			<!-- Header -->
			<header class="header">
                @include('tutor.partials.header')
			</header>
			<!-- /Header -->
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						@yield('edecx')
					</div>
				</div>
			</div>
			<!-- /Page Content -->
			<!-- Footer -->
			<footer class="footer">
				@include('tutor.partials.footer')
			</footer>
			<!-- /Footer -->
		</div>
		<!-- /Main Wrapper -->
		<!-- jQuery -->
        @include('tutor.partials.script')
        @yield('page-js-script')
        @include('tutor.partials.location')
    </body>
</html>
