


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
									<a href="login.html">Back to Home</a>
								</div>
							</div>
							<h1>{{ $program->title }}</h1>
                            <p>{{ Str::words( $program->description, 25, '...') }}</p>
							<div class="row">
								<div class="col-lg-5">
									<div class="profile-box">
										<div class="circle-bar circle-bar1 text-center">
											<div class="circle-graph1" data-percent="75">
												<p>75% <span>3 of 4</span></p>
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
											<span class="active-color">2</span>
											<div class="personal-text">
												<h4>Select Level</h4>
												<p class="mb-0">Setup Your Courses</p>
											</div>
										</div>
										<div class="personal-detail d-flex align-items-center">
											<span class="active-color active-bar">3</span>
											<div class="personal-text">
												<h4>Course</h4>
												<p class="mb-0">Review Your Selections</p>
											</div>
										</div>
										<div class="personal-detail d-flex align-items-center">
											<span>4</span>
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

                                         <!-- Student Dashboard -->
                <div class="alert alert-warning">
                    <p>The Maximum credit unit is <strong>{{$part->max_credit}}</strong> and the minimum is <strong>{{$part->min_credit}}</strong></p>
                </div>
                <div class="container mx-auto">
                    <div class="bg-white p-3">
                        @if ($courses->isEmpty())
                            <p class="text-center text-muted">No courses available.</p>
                        @else
                            <form action="{{ route('courses.register') }}" method="POST" id="courseForm">
                                @csrf
                                <input type="hidden" name="part_id" value="{{ $part->id }}">
                                <div id="courseList">
                                    <!-- Automatically checked courses first -->
                                    @foreach ($courses->filter(fn($course) => $course->course_category === 'Core' || $course->course_category === 'General') as $course)
                                        <div class="d-flex align-items-center border-bottom py-3">
                                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-check-input me-2" checked disabled>
                                            <input type="hidden" name="courses[]" value="{{ $course->id }}">
                                            <div class="me-4">
                                                <p class="text-dark fw-medium">{{ $course->title }} (₦{{ $course->course_amount }})</p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <p class="text-muted credit-unit" data-credit="{{ $course->credit_unit }}">{{ $course->credit_unit }} Credits</p>
                                                <p class="text-muted course-amount" data-amount="{{ $course->course_amount }}"></p>
                                                <p class="text-muted">{{ $course->course_category }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Other courses -->
                                    @foreach ($courses->filter(fn($course) => $course->course_category !== 'Core' && $course->course_category !== 'General') as $course)
                                        <div class="d-flex align-items-center border-bottom py-3">
                                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-check-input me-2">
                                            <div class="me-4">
                                                <p class="text-dark fw-medium">{{ $course->title }} (₦{{ $course->course_amount }})</p>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <p class="text-muted credit-unit" data-credit="{{ $course->credit_unit }}">{{ $course->credit_unit }} Credits</p>
                                                <p class="text-muted course-amount" data-amount="{{ $course->course_amount }}"></p>
                                                <p class="text-muted">{{ $course->course_category }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <p class="text-dark fw-medium">Total Credits: <span id="totalCredits">0</span></p>
                                    <p class="text-dark fw-medium">Total Amount: ₦<span id="totalAmount">0</span></p>
                                    <button type="submit" class="btn btn-danger ">
                                       Checkout
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>



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
       <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const totalCreditsElement = document.getElementById('totalCredits');
            const totalAmountElement = document.getElementById('totalAmount');
            let totalCredits = 0;
            let totalAmount = 0;

            // Initial calculation of total credits and amount
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    totalCredits += parseInt(checkbox.closest('.d-flex').querySelector('.credit-unit').dataset.credit);
                    totalAmount += parseInt(checkbox.closest('.d-flex').querySelector('.course-amount').dataset.amount);
                }
            });

            totalCreditsElement.innerText = totalCredits;
            totalAmountElement.innerText = totalAmount;

            // Event listener for checkbox changes
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    totalCredits = calculateTotalCredits();
                    totalAmount = calculateTotalAmount();
                    totalCreditsElement.innerText = totalCredits;
                    totalAmountElement.innerText = totalAmount;
                });
            });

            function calculateTotalCredits() {
                let total = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseInt(checkbox.closest('.d-flex').querySelector('.credit-unit').dataset.credit);
                    }
                });
                return total;
            }

            function calculateTotalAmount() {
                let total = 0;
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        total += parseInt(checkbox.closest('.d-flex').querySelector('.course-amount').dataset.amount);
                    }
                });
                return total;
            }
        });
    </script>
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





