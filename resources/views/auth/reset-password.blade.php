{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<!DOCTYPE html>
<html lang="en">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Public Relations and Leadership Academy</title>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}')}}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css')}}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<div class="row">

				<!-- Login Banner -->
				<div class="col-md-6 login-bg">
					<div class="owl-carousel login-slide owl-theme aos" data-aos="fade-up">
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Public Relations and Leadership Academy Courses.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{ asset('assets/img/login-img.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Public Relations and Leadership Academy  Courses.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{ asset('assets/img/login-img.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>Public Relations and Leadership Academy  Courses.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Login Banner -->

				<div class="col-md-6 login-wrap-bg">

					<!-- Login -->
					<div class="login-wrapper">
						<div class="loginbox">
							<div class="img-logo">
								<img src="{{asset('assets/img/logo.png')}}"class="img-fluid" alt="Logo">
								<div class="back-home">
									<a href="\">Back to Home</a>
								</div>
							</div>
							<h1>Reset Password </h1>
							<div class="reset-password">
								<p>Enter your email and your password.</p>
							</div>
							<form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                 <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <x-auth-session-status class="mb-4" :status="session('status')" />
								<div class="input-block">
									<label class="form-control-label">Email</label>
									<input type="email" name="email" :value="old('email')" class="form-control" placeholder="Enter your email address">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
								</div>
								<div class="input-block">
									<label class="form-control-label">Password</label>
									<input type="password" name="password" :value="old('password')" class="form-control" placeholder="Enter your password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
								</div>
								<div class="input-block">
									<label class="form-control-label">Confirm Password</label>
									<input id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"  :value="old('password_confirmation')" class="form-control" placeholder="Enter your password">
								</div>
								<div class="d-grid">
									<button class="btn btn-start" type="submit">Submit</button>
								</div>
							</form>
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

		<!-- Custom JS -->
		<script src="{{ asset('assets/js/script.js')}}"></script>

	</body>
</html>
