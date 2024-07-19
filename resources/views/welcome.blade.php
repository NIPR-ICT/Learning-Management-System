<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Public Relations and Leadership Acadamey </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.svg')}}">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

		<!-- Slick CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/slick/slick.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/slick/slick-theme.css')}}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

		<!-- Aos CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/aos/aos.css')}}">

        	<!-- Feather CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/feather.css')}}">

		<!-- Boxioons CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/boxicons/css/boxicons.min.css')}}">


		<!-- Swiper CSS -->
		<link rel="stylesheet" href="{{asset('assets/plugins/swiper/swiper.min.css')}}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
            @include('includes.layout-frontend.header')
			<!-- /Header -->

            @yield('content')

			<!-- Footer -->
            @include('includes.layout-frontend.footer')
			<!-- /Footer -->

		</div>
	   <!-- /Main Wrapper -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
        @include('includes.script')
		<!-- jQuery -->

		<!-- Bootstrap Core JS -->
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

		<!-- counterup JS -->
		<script src="{{asset('assets/js/jquery.waypoints.js')}}"></script>
		<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>

		<!-- Select2 JS -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!-- Owl Carousel -->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

		<!-- Slick Slider -->
		<script src="{{asset('assets/plugins/slick/slick.js')}}"></script>

		<!-- Aos -->
		<script src="{{asset('assets/plugins/aos/aos.js')}}"></script>

        	<!-- Sticky Sidebar JS -->
            <script src="{{asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
            <script src="{{asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

            <!-- Slimscroll JS -->
		<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

		<!-- Swiper JS -->
		<script src="{{asset('assets/plugins/swiper/swiper.min.js')}}"></script>
		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	</body>
</html>
