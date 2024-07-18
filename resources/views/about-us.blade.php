@extends('welcome')

	<!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bar-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 pt-5">
                    <div class="breadcrumb-list pt-5">
                        <h2 class="breadcrumb-title">About Us</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
  @section('content')

  	<!-- Help Details -->
      <div class="page-content">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="terms-content">
                        @if (empty($aboutUs))
                        No data yet :(
                        @else
                        {{ $aboutUs->content }}
                        @endif
                    </div>


                    <section class="testimonial-sec">
                        <div class="container">
                            <div class="testimonial-two-img">
                                <img src="assets/img/bg/map-user.png" alt="Img" class="img-fluid">
                            </div>
                            <div class="testimonial-subhead-two">
                                <div class="col-xl-8 col-lg-10 col-md-10 mx-auto" data-aos="fade-down">
                                    <div class="testimonial-inner">
                                        <div class="header-two-title testimonial-head-two text-center">
                                            <h2 data-aos="fade-down">Join over <span>

                                            {{  $user }}
                                            </span> Students</h2>
                                            <div class="header-two-text text-center">
                                                <p>Get certified, master modern tech skills, and level up your career — whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.</p>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-md-4 col-sm-12" data-aos="fade-up">
                                                <div class="course-count-two course-count">
                                                    <h4><span class="counterUp text-orange">{{ $enrolled }}</span></h4>
                                                    <h5>Students Enrolled</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12" data-aos="fade-up">
                                                <div class="course-count-two  course-count">
                                                    <h4><span class="counterUp text-green">{{ $course }}</span></h4>
                                                    <h5>Total Courses</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12" data-aos="fade-up">
                                                <div class="course-count-two  course-count">
                                                    <h4><span class="counterUp text-blue" > {{  $user }}</span></h4>
                                                    <h5>Students Worldwide</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Testimonial -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Help Details -->


  @endsection
