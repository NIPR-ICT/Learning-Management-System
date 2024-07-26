
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
                        <div class="circle-graph1" data-percent="99">
                            <p>99% <span>4 of 4</span></p>
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
                        <span class="active-color ">4</span>
                        <div class="personal-text">
                            <h4>Summary</h4>
                            <p class="mb-0">Complete Enrollments Apply Coupon</p>
                        </div>
                    </div>

                    <div class="personal-detail d-flex align-items-center">
                        <span class="active-color active-bar">5</span>
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
                        @if (session()->has('totalAmount2') && session()->has('part'))
                            <div class="col-md-12">
                                <div class="card shadow-sm rounded-lg">
                                    <div class="card-body text-dark">
                                        <!-- Receipt Header -->
                                        <div class="receipt-header mb-4">
                                            <p class="text-center">Checkout Details!</p>
                                        </div>

                                        <!-- Receipt Table -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" colspan="2">Upaid Receipt</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Course Title -->
                                                    <tr>
                                                        <td class="font-weight-bold">Course Title:</td>
                                                        <td><?php $part = session('part'); ?>{{ $part->name }} of {{ $part->program->title }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="font-weight-bold">Courses Payable Amount:</td>
                                                        <td>₦{{ session('totalAmount2') }}</td>
                                                    </tr>

                                                    <!-- Discounted Amount -->
                                                    <tr>
                                                        <td class="font-weight-bold">Discounted Amount:</td>
                                                        <td>₦{{ session('discounted') }}</td>
                                                    </tr>


                                                    <!-- Extra Services -->
                                                    @if (!empty(session('extra_services', [])))
                                                        <tr>
                                                            <td class="font-weight-bold" colspan="2">Extra Services:</td>
                                                        </tr>
                                                        @foreach (session('extra_services', []) as $service)
                                                            <tr>
                                                                <td>{{ $service['item'] }}</td>
                                                                <td>₦{{ $service['amount'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    <!-- Extra Services Amount -->
                                                    @if (session('extra_services_amount', 0) > 0)
                                                        <tr>
                                                            <td class="font-weight-bold">Extra Services Amount:</td>
                                                            <td>₦{{ session('extra_services_amount') }}</td>
                                                        </tr>
                                                    @endif

                                                    <!-- Total Payable Amount -->

                                                    <tr class="font-weight-bold">
                                                        <td>Total Payable Amount:</td>
                                                        <td class="text-danger">₦{{ session('totalPayableAmount') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Payment Button -->
                                        <div class="mb-4">
                                            <form action="{{ route('pay') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn  btn-danger w-100 w-sm-auto">Pay</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <script type="text/javascript">
                                window.location = "{{ url()->previous() }}";
                            </script>
                        @endif

                    <!-- /Student Dashboard -->
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



