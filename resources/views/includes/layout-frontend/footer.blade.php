<footer class="footer">

    <!-- Footer Top -->
    <div class="footer-top aos" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            @php
                                $about = \App\Models\PreliminaryPage::where('type', 'about')->first();
                            @endphp
                            @if (!empty($about))
                            <p>{{ Str::words($about->content, 25, '...')  }}</p>
                            @endif
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-2 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Useful links</h2>
                        <ul>
                            <li><a href="{{ route('about.view') }}">About Us</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="{{ route('blog.view') }}">Articles</a></li>
                            <li><a href="#">Become an Instructor</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-2 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Student</h2>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('contact.view') }}">Profile</a></li>
                            <li><a href="#">Student</a></li>
                            <li><a href="#"> Dashboard</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-4 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">News letter</h2>
                        <div class="news-letter">
                            <form>
                                <input type="text" class="form-control" placeholder="Enter your email address" name="email">
                            </form>
                        </div>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <img src="{{asset('assets/img/icon/icon-20.svg')}}" alt="Img" class="img-fluid">
                                <p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
                            </div>
                            <p>
                                <img src="{{asset('assets/img/icon/icon-19.svg')}}" alt="Img" class="img-fluid">
                                dreamslms@example.com
                            </p>
                            <p class="mb-0">
                                <img src="{{asset('assets/img/icon/icon-21.svg')}}" alt="Img" class="img-fluid">
                                +234 810 2345 234
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6">
                        <div class="privacy-policy">
                            <ul>
                                {{-- <li><a href="term-condition.html">Terms</a></li>
                                <li><a href="privacy-policy.html">Privacy</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; 2024 Public Relations and Leadership Academy. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>
