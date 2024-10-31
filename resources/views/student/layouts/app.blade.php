<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>EDECX</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        @include('student.partials.style')
	</head>
	<body>
		<!-- Main Wrapper -->
		<div class="main-wrapper">
			<!-- Header -->
			<header class="header">
                @include('student.partials.header')
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
				<!-- Footer Top -->
                @include('student.partials.footer')
				<!-- /Footer Bottom -->
			</footer>
			<!-- /Footer -->
		</div>
		<!-- /Main Wrapper -->
		<!-- jQuery -->
        @include('student.partials.scripts')
        @yield('page-js-script')
        @include('tutor.partials.location')
    </body>
</html>
