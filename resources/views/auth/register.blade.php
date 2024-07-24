{{-- <x-guest-layout>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

       <!-- username -->

        <div class="mt-4">
            <x-input-label for="username" :value="__('username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
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
		<div class="main-wrapper log-wrap">

			<div class="row">

				<!-- Login Banner -->
				<div class="col-md-6 login-bg">
					<div class="owl-carousel login-slide owl-theme">
						<div class="welcome-login">
							<div class="login-banner">
								<img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>DreamsLMS Courses.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login">
							<div class="login-banner">
								<img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>DreamsLMS Courses.</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
						<div class="welcome-login">
							<div class="login-banner">
								<img src="assets/img/login-img.png" class="img-fluid" alt="Logo">
							</div>
							<div class="mentor-course text-center">
								<h2>Welcome to <br>DreamsLMS Courses.</h2>
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
								<img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
								<div class="back-home">
									<a href="\">Back to Home</a>
								</div>
							</div>
							<h1>Sign up</h1>
							<form method="POST" action="{{ route('register') }}">
                                @csrf
                                @if (session('errors'))
                                <div class="mb-4 text-sm text-red-600">
                                    {{ session('errors') }}
                                </div>
                                @endif
								<div class="input-block">
									<label class="form-control-label">First Name</label>
									<input type="text" class="form-control" id="name"   name="name"  placeholder="Enter your Full Name">
								</div>
								<div class="input-block">
									<label class="form-control-label">Last Name</label>
									<input type="text" name="username" class="form-control" placeholder="Enter your Last Name">
								</div>
								<div class="input-block">
									<label class="form-control-label">Email</label>
									<input type="email" name="email" required autocomplete="email" class="form-control" placeholder="Enter your email address">
                                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                                    </div>
								<div class="input-block">
									<label class="form-control-label">Password</label>
									<div class="pass-group" id="passwordInput">
										<input type="password" class="form-control pass-input"  name="password"
                                        required autocomplete="new-password" placeholder="Enter your password">
										<span class="toggle-password feather-eye"></span>
										<span class="pass-checked"><i class="feather-check"></i></span>
									</div>

									{{-- <div  class="password-strength" id="passwordStrength">
										<span id="poor"></span>
										<span id="weak"></span>
										<span id="strong"></span>
										<span id="heavy"></span>
									</div> --}}
                                    {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
									<div id="passwordInfo">

                                    </div>
								</div>

                                <div class="input-block">
									<label class="form-control-label">Confirm Password</label>
									<div class="pass-group" id="passwordInput">
										<input  type="password"
                                        name="password_confirmation" required autocomplete="new-password" class="form-control pass-input" placeholder="Confirm your password">
									</div>

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
									<div id="passwordInfo">

                                    </div>
								</div>


								<div class="form-check remember-me">
									<label class="form-check-label mb-0">
									  <input class="form-check-input" type="checkbox" required
                                      name="remember"
                                      > I agree to the <a href="term-condition.html">Terms of Service</a> and <a href="privacy-policy.html">Privacy Policy.</a>
									</label>
								</div>
								<div class="d-grid">
									<button class="btn btn-primary btn-start" type="submit">Create Account</button>
								</div>

							</form>
						</div>
						<div class="google-bg text-center">
							<span><a href="#">Or sign in with</a></span>
							<div class="sign-google">
								<ul>
									<li><a href="#"><img src="assets/img/net-icon-01.png" class="img-fluid" alt="Logo"> Sign In using Google</a></li>
									<li><a href="#"><img src="assets/img/net-icon-02.png" class="img-fluid" alt="Logo">Sign In using Facebook</a></li>
								</ul>
							</div>
							<p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
						</div>
					</div>
					<!-- /Login -->

				</div>

			</div>

	   </div>
	   <!-- /Main Wrapper -->

		<!-- jQuery -->
		<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Owl Carousel -->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

		<!-- Validation-->
		<script src="{{asset('assets/js/validation.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js')}}"></script>

	</body>
</html>
