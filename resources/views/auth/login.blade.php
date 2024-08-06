{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Error Message -->
    @if (session('error'))
        <div class="mb-4 text-sm text-red-600">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

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
		<div class="main-wrapper log-wrap">

<div class="row">

    <!-- Login Banner -->
    <div class="col-md-6 login-bg">
        <div class="owl-carousel login-slide owl-theme">
            <div class="welcome-login">
                <div class="login-banner">
                    <img src="{{asset('assets/img/sigin3.png')}}" class="img-fluid" alt="Logo">
                </div>
                <div class="mentor-course text-center">
                    <h2>Welcome to <br>Public Relations and Leadership Academy Courses.</h2>
                    <p>awaiting write up</p>
                </div>
            </div>
            <div class="welcome-login">
                <div class="login-banner">
                    <img src="{{asset('assets/img/sigin1.png')}}" class="img-fluid" alt="Logo">
                </div>
                <div class="mentor-course text-center">
                    <h2>Welcome to <br>Public Relation and Leadership Academy Courses.</h2>
                    <p>awaiting write up</p>
                </div>
            </div>
            <div class="welcome-login">
                <div class="login-banner">
                    <img src="{{asset('assets/img/sigin2.png')}}" class="img-fluid" alt="Logo">
                </div>
                <div class="mentor-course text-center">
                    <h2>Welcome to <br>Public Relation and Leadership Academy Courses.</h2>
                    <p>awaiting write up</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login Banner -->

    <div class="col-md-6 login-wrap-bg">

        <!-- Login -->
        <div class="login-wrapper">
            <div class="loginbox">
                <div class="w-100">
                    <div class="img-logo">
                        <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                        <div class="back-home">
                            <a href="/">Back to Home</a>
                        </div>
                    </div>
                    <h1>Sign into Your Account</h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if (session('errors'))
                        <div class="mb-4 text-sm text-red-600">
                            {{ session('errors') }}
                        </div>
                        @endif
                        <div class="input-block">
                            <label class="form-control-label">Email</label>
                            <input type="email" name="email" :value="old('email')"  class="form-control" placeholder="Enter your email address">
                        </div>
                        <div class="input-block">
                            <label class="form-control-label">Password</label>
                            <div class="pass-group">
                                <input type="password" name="password"
                                required autocomplete="current-password" class="form-control pass-input" placeholder="Enter your password">
                                <span class="feather-eye toggle-password"></span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="forgot">
                            <span><a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a></span>
                        </div>
                        <div class="remember-me">
                            <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                <input type="checkbox" name="remember">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-start" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="google-bg text-center">
                {{-- <span><a href="#">Or sign in with</a></span>
                <div class="sign-google">
                    <ul>
                        <li><a href="#"><img src="{{asset('assets/img/net-icon-01.png')}}" class="img-fluid" alt="Logo"> Sign In using Google</a></li>
                        <li><a href="#"><img src="{{asset('assets/img/net-icon-02.png')}}" class="img-fluid" alt="Logo">Sign In using Facebook</a></li>
                    </ul>
                </div> --}}
                <p class="mb-0">New User ? <a href="{{ route('register') }}">Create an Account</a></p>
            </div>
        </div>
        <!-- /Login -->

    </div>

</div>


		<!-- jQuery -->
		<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>

		<!-- Bootstrap Core JS -->
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Owl Carousel -->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

		<!-- Custom JS -->
		<script src="{{asset('assets/js/script.js')}}"></script>

	</body>
</html>
