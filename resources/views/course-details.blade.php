@extends('welcome')

<!-- Breadcrumb -->
<div class="breadcrumb-bar breadcrumb-bar-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 pt-5">
                <div class="breadcrumb-list pt-5">
                    <h2 class="breadcrumb-title">Course</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item " aria-current="page">Course </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $course->title }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->
@section('content')

    <!-- Inner Banner -->
    <div class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instructor-wrap border-bottom-0 m-0">
                        <div class="about-instructor align-items-center">
                            <div class="abt-instructor-img">
                                <a href="instructor-profile.html"><img src="{{ asset('assets/img/user/user1.jpg') }}"
                                        alt="img" class="img-fluid"></a>
                            </div>
                            <div class="instructor-detail me-3">
                                <h5><a href="instructor-profile.html">{{ $course->creator->name }}</a></h5>
                                <p>{{ $course->program->title }}</p>
                            </div>
                            <div class="rating mb-0">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating"><span>4.5</span> (15)</span>
                            </div>
                        </div>
                        <span class="web-badge mb-3">{{ $course->creator->role }}</span>
                    </div>
                    <h2>{{ $course->title }}</h2>
                    <p>{{ Str::words($course->description, 25, '...') }}</p>
                    <div class="course-info d-flex align-items-center border-bottom-0 m-0 p-0">
                        <div class="cou-info">
                            <img src="{{ asset('assets/img/icon/icon-01.svg') }}" alt="Img">
                            <p>{{ count($course->lessons) }}+ Lesson</p>
                        </div>
                        <div class="cou-info">
                            <img src="{{ asset('assets/img/icon/timer-icon.svg') }}" alt="Img">
                            <p>9hr 30min</p>
                        </div>
                        <div class="cou-info">
                            <img src="{{ asset('assets/img/icon/people.svg') }}" alt="Img">
                            <p>{{ count($course->enrollments) }} students enrolled</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Inner Banner -->

    <!-- Course Content -->
    <section class="page-content course-sec">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">

                    <!-- Overview -->
                    <div class="card overview-sec">
                        <div class="card-body">
                            {!! $course->description !!}
                        </div>
                    </div>
                    <!-- /Overview -->

                    <!-- Course Content -->
                    <div class="card content-sec">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="subs-title">Course Content</h5>
                                </div>
                                <div class="col-sm-6 text-sm-end">
                                    <h6>{{ count($course->lessons) }} Modules    </h6>
                                </div>
                            </div>
                            @foreach ($course->modules as $key => $item)
                            <div class="course-card">
                                <h6 class="cou-title">
                                    <a class="collapsed" data-bs-toggle="collapse" href="#collapse{{ $key }}"
                                        aria-expanded="false">{{ $item->title }}</a>
                                </h6>
                                <div id="collapse{{ $key }}" class="card-collapse collapse" style="">
                                    <ul>
                                        <li>
                                            <p><img src="{{ asset('assets/img/icon/play.svg') }}" alt="Img"
                                                    class="me-2">Lecture1.1 </p>
                                            <div>
                                                <a href="javascript:void(0);">Preview</a>
                                                <span>02:53</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /Course Content -->

                    <!-- Instructor -->
                    {{-- <div class="card instructor-sec">
                        <div class="card-body">
                            <h5 class="subs-title">About the instructor</h5>
                            <div class="instructor-wrap">
                                <div class="about-instructor">
                                    <div class="abt-instructor-img">
                                        <a href="instructor-profile.html"><img
                                                src="{{ asset('assets/img/user/user1.jpg') }}" alt="img"
                                                class="img-fluid"></a>
                                    </div>
                                    <div class="instructor-detail">
                                        <h5><a href="instructor-profile.html">{{ $course->creator->name }}</a></h5>
                                        <p>{{ $course->creator->role }}</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">4.5 Instructor Rating</span>
                                </div>
                            </div>
                            <div class="course-info d-flex align-items-center">
                                <div class="cou-info">
                                    <img src="{{ asset('assets/img/icon/play.svg') }}" alt="Img">
                                    @php
                                        $createdCourses = \App\Models\Course::where(
                                            'created_by',
                                            $course->creator->id,
                                        )->count();
                                    @endphp
                                    <p>{{ $createdCourses }} Courses</p>
                                </div>
                                <div class="cou-info">
                                    <img src="{{ asset('assets/img/icon/icon-01.svg') }}" alt="Img">
                                    <p>12+ Lesson</p>
                                </div>
                                <div class="cou-info">
                                    <img src="{{ asset('assets/img/icon/icon-02.svg') }}" alt="Img">
                                    <p>9hr 30min</p>
                                </div>
                                <div class="cou-info">
                                    <img src="{{ asset('assets/img/icon/people.svg') }}" alt="Img">
                                    <p>270,866 students enrolled</p>
                                </div>
                            </div>
                            <p>UI/UX Designer, with 7+ Years Experience. Guarantee of High Quality Work.</p>
                            <p>Skills: Web Design, UI Design, UX/UI Design, Mobile Design, User Interface Design, Sketch,
                                Photoshop, GUI, Html, Css, Grid Systems, Typography, Minimal, Template, English, Bootstrap,
                                Responsive Web Design, Pixel Perfect, Graphic Design, Corporate, Creative, Flat, Luxury and
                                much more.</p>


                            <p>Available for:</p>
                            <ul>
                                <li>1. Full Time Office Work</li>
                                <li>2. Remote Work</li>
                                <li>3. Freelance</li>
                                <li>4. Contract</li>
                                <li>5. Worldwide</li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- /Instructor -->

                    <!-- Reviews -->
                    <div class="card review-sec">
                        {{-- <h5 class="subs-title">Reviews</h5> --}}
                        <h5 class="card-header">Reviews</h5>
                        @foreach ($course->review as $item)

                        <div class="card-body">

                            <div class="instructor-wrap">
                                <div class="about-instructor">
                                    <div class="abt-instructor-img">
                                        @php
                                            $user = \App\Models\User::find($item->id);
                                        @endphp
                                        <a href="instructor-profile.html"><img
                                                src="{{ asset('assets/img/user/user1.jpg') }}" alt="img"
                                                class="img-fluid"></a>
                                    </div>
                                    <div class="instructor-detail">
                                        <h5><a href="instructor-profile.html">{{ $user->name }}</a></h5>
                                        <p>{{ $user->role }}</p>
                                    </div>
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">4.5 Instructor Rating</span>
                                </div>
                            </div>
                            <p class="rev-info">“ {{ $item->message }} “</p>
                            {{-- <a href="javascript:void(0);" class="btn btn-reply"><i class="feather-corner-up-left"></i>
                                Reply</a> --}}
                        </div>
                        @endforeach
                    </div>
                    <!-- /Reviews -->

                    <!-- Comment -->
                    <div class="card comment-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Post A comment</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <input type="text" id="fullname" class="form-control" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-block">
                                            <input type="email" id="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-block">
                                    <input type="text" id="subject" class="form-control" placeholder="Subject">
                                </div>
                                <div class="input-block">
                                    <textarea rows="4" id="message" class="form-control" placeholder="Your Comments"></textarea>
                                </div>
                                <div class="submit-section">
                                    <button class="btn submit-btn" onclick="postCourseComment({{ $course->id }})" >Submit</button>
                                </div>
                        </div>
                    </div>
                    <!-- /Comment -->

                </div>

                <div class="col-lg-4">
                    <div class="sidebar-sec">

                        <!-- Video -->
                        <div class="video-sec vid-bg">
                            <div class="card">
                                <div class="card-body">
                                    <a href="https://www.youtube.com/embed/1trvO6dqQUI" class="video-thumbnail"
                                        data-fancybox="">
                                        <div class="play-icon">
                                            <i class="fa-solid fa-play"></i>
                                        </div>
                                        <img class="" src="{{ asset('assets/img/video.jpg') }}" alt="Img">
                                    </a>
                                    <div class="video-details">
                                        <div class="course-fee">
                                            <h2>&#8358;{{ $course->course_amount }}</h2>
                                            {{-- <p><span>99.00</span> 50% off</p> --}}
                                        </div>
                                        <div class="row gx-2">
                                            <div class="col-md-6">
                                                <a href="javascript:void(0);"  onclick="addToCart({{ $course->id }},'{{ $course->creator->name }}','{{ $course->slug }}','{{ $course->title }}' )" class="btn btn-wish w-100">
                                                    <i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a id="{{ $course->id }}" onclick="addToWishList(this.id)" href="javascript:void(0);" class="btn btn-wish w-100"><i
                                                        class="fa fa-heart"></i> Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <a href="checkout.html" class="btn btn-enroll w-100">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Video -->

                        <!-- Include -->
                        <div class="card include-sec">
                            <div class="card-body">
                                <div class="cat-title">
                                    <h4>Includes</h4>
                                </div>
                                <ul>
                                    <li><img src="{{ asset('assets/img/icon/import.svg') }}" class="me-2"
                                            alt="Img"> {{ count($course->lessons) }} accoumulated lesson</li>
                                    <li><img src="{{ asset('assets/img/icon/play.svg') }}" class="me-2"
                                            alt="Img"> {{ count($course->materials) }} downloadable resources</li>
                                    <li><img src="{{ asset('assets/img/icon/key.svg') }}" class="me-2" alt="Img">
                                        Full lifetime access</li>
                                    {{-- <li><img src="{{ asset('assets/img/icon/mobile.svg') }}" class="me-2"
                                            alt="Img"> Access on mobile and TV</li> --}}
                                    <li><img src="{{ asset('assets/img/icon/cloud.svg') }}" class="me-2"
                                            alt="Img"> Assignments</li>
                                    <li><img src="{{ asset('assets/img/icon/teacher.svg') }}" class="me-2"
                                            alt="Img"> Certificate of Completion</li>
                                </ul>
                            </div>
                        </div>
                        <!-- /Include -->

                        <!-- Features -->
                        {{-- <div class="card feature-sec">
                            <div class="card-body">
                                <div class="cat-title">
                                    <h4>Includes</h4>
                                </div>
                                <ul>
                                    <li><img src="{{ asset('assets/img/icon/users') }}" class="me-2" alt="Img">
                                        Enrolled: <span>32 students</span></li>
                                    <li><img src="{{ asset('assets/img/icon/timer') }}" class="me-2" alt="Img">
                                        Duration: <span>20 hours</span></li>
                                    <li><img src="{{ asset('assets/img/icon/chapter') }}" class="me-2"
                                            alt="Img"> Chapters: <span>15</span></li>
                                    <li><img src="{{ asset('assets/img/icon/video') }}" class="me-2" alt="Img">
                                        Video:<span> 12 hours</span></li>
                                    <li><img src="{{ asset('assets/img/icon/chart') }}" class="me-2" alt="Img">
                                        Level: <span>Beginner</span></li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- /Features -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Pricing Plan -->
