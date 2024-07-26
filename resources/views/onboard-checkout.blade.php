
<!DOCTYPE html>
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title> Public Relations and Leadership Academy</title>

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

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('assets/plugins/feather/feather.css')}}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<div class="row">

				<!-- Login Banner -->
				<div class="col-lg-4 col-md-6 login-bg">
					<div class="owl-carousel login-slide owl-theme">
						<div class="welcome-login register-step">
							<div class="login-banner">
								<img src="{{ asset('assets/img/register-img.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Public Relations and Leadership Academy.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login register-step">
							<div class="login-banner">
								<img src="{{ asset('assets/img/register-img.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Public Relations and Leadership Academy.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login register-step">
							<div class="login-banner">
								<img src="{{ asset('assets/img/register-img.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Public Relations and Leadership Academy.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Login Banner -->

				<div class="col-lg-8 col-md-6 login-wrap-bg">

					<!-- Login -->
					<div class="login-wrapper">
						<div class="loginbox register-box">
							<div class="img-logo">
								<img src="{{ asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
								<div class="back-home">
									<a href="/">Back to Home</a>
								</div>
							</div>
							<h1>{{ $program->title }}</h1>
                            <p>{{ Str::words( $program->description, 25, '...') }}</p>
							<div class="row">
								<div class="col-lg-5">
									<div class="profile-box">
										<div class="circle-bar circle-bar1 text-center">
											<div class="circle-graph1" data-percent="90">
												<p>90% <span>4 of 5</span></p>
											</div>
										</div>
										<h3>Programme Enrollment</h3>
										<div class="personal-detail d-flex align-items-center">
											<span class="active-color">1</span>
											<div class="personal-text">
												<h4>Programme Details</h4>
												<p class="mb-0">Setup Your Programme details</p>
											</div>
										</div>
										<div class="personal-detail d-flex align-items-center">
											<span class="active-color ">2</span>
											<div class="personal-text">
												<h4>Select Level</h4>
												<p class="mb-0">Setup Your Courses</p>
											</div>
										</div>
										<div class="personal-detail d-flex align-items-center">
											<span class="active-color">3</span>
											<div class="personal-text">
												<h4>Select Courses</h4>
												<p class="mb-0">Review Your Selections</p>
											</div>
										</div>
										<div class="personal-detail d-flex align-items-center">
											<span class="active-color active-bar">4</span>
											<div class="personal-text">
												<h4>Summary</h4>
												<p class="mb-0">Complete Enrollments Apply Coupon</p>
											</div>
										</div>

										<div class="personal-detail d-flex align-items-center">
											<span class="">5</span>
											<div class="personal-text">
												<h4>Checkout and Payments</h4>
												<p class="mb-0">Complete Enrollments</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-7">
									<div class="personal-form">
										<h4>Programme Details</h4>

                                            @if (session()->has('totalAmount') && session()->has('part'))
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        {{-- <h2 class="h5 mb-4">Checkout</h2> --}}
                                                        <div class="mb-4">
                                                            <label class="form-label">Course Title:</label>
                                                            <?php $part = session('part'); ?>
                                                            <p class="h6">{{ $part->name }} of {{ $part->program->title }}</p>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Amount:</label>
                                                            <p class="h6">₦{{session('totalAmount') }}</p>
                                                        </div>
                                                        <form action="{{ route('onboard.apply.coupon') }}" method="POST">
                                                            @csrf
                                                            <div class="mb-4">
                                                                <label for="coupon" class="form-label">Apply Coupon Code:</label>
                                                                <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Enter coupon code">
                                                            </div>
                                                            <div class="mb-4">
                                                                <button type="submit" class="btn btn-danger w-100 w-lg-auto">Complete Checkout</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            @else
                                            <script type="text/javascript">
                                                window.location = "{{ url()->previous() }}";
                                            </script>
                                            @endif

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Login -->

				</div>

			</div>

	   </div>
	   <!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="{{ asset('assets/js/jquery-3.7.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Owl Carousel -->
		<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>

		<!-- Select2 JS -->
		<script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!-- Progress JS -->
		<script src="{{ asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('assets/js/script.js')}}"></script>



