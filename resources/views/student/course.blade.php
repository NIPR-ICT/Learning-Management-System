@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>

<!-- Student Courses -->
<div class="col-xl-9 col-lg-9">

    <div class="settings-widget card-info">
        <div class="settings-menu p-0">
            <div class="profile-heading">
                <h3>Enrolled Courses</h3>
            </div>
            <div class="checkout-form pb-0">
                <div class="wishlist-tab">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="active" data-bs-toggle="tab" data-bs-target="#enroll-courses">Enrolled Courses (06)</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#active-courses">Active Courses (03)</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#complete-courses">Completed Courses (03)</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="enroll-courses">
                        <div class="row">

                            <!-- Course Grid -->
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="course-details.html">
                                                <img class="img-fluid" alt="Img" src="{{asset('assets/img/course/course-02.jpg')}}">
                                            </a>
                                            <div class="price">
                                                <h3>$80 <span>$99.00</span></h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="instructor-profile.html"><img src="{{asset('assets/img/user/user2.jpg')}}" alt="Img" class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="instructor-profile.html">Cooper</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text"><a href="course-details.html">Wordpress for Beginners - Master Wordpress Quickly</a></h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-01.svg')}}" alt="Img">
                                                    <p>12+ Lesson</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-02.svg')}}" alt="Img">
                                                    <p>70hr 30min</p>
                                                </div>
                                            </div>
                                            <div class="rating mb-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <span class="d-inline-block average-rating"><span>5.0</span> (20)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Course Grid -->

                            <!-- Course Grid -->
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="course-details.html">
                                                <img class="img-fluid" alt="Img" src="{{asset('assets/img/course/course-03.jpg')}}">
                                            </a>
                                            <div class="price combo">
                                                <h3>FREE</h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="instructor-profile.html"><img src="{{asset('assets/img/user/user5.jpg')}}" alt="Img" class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="instructor-profile.html">Jenny</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text"><a href="course-details.html">Sketch from A to Z (2022): Become an app designer</a></h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-01.svg')}}" alt="Img">
                                                    <p>10+ Lesson</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-02.svg')}}" alt="Img">
                                                    <p>40hr 10min</p>
                                                </div>
                                            </div>
                                            <div class="rating mb-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating"><span>3.0</span> (18)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Course Grid -->

                            <!-- Course Grid -->
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="course-details.html">
                                                <img class="img-fluid" alt="Img" src="{{asset('assets/img/course/course-04.jpg')}}">
                                            </a>
                                            <div class="price">
                                                <h3>$65 <span>$70.00</span></h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="instructor-profile.html"><img src="{{asset('assets/img/user/user4.jpg')}}" alt="Img" class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="instructor-profile.html">Nicole Brown</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text"><a href="course-details.html">Learn Angular Fundamentals From beginning to advance lavel</a></h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-01.svg')}}" alt="Img">
                                                    <p>15+ Lesson</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-02.svg')}}" alt="Img">
                                                    <p>80hr 40min</p>
                                                </div>
                                            </div>
                                            <div class="rating mb-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating"><span>4.0</span> (10)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Course Grid -->


                        </div>
                    </div>

                    <div class="tab-pane fade" id="active-courses">
                        <div class="row">

                            <!-- Course Grid -->
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="course-details.html">
                                                <img class="img-fluid" alt="Img" src="{{asset('assets/img/course/course-04.jpg')}}">
                                            </a>
                                            <div class="price">
                                                <h3>$65 <span>$70.00</span></h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="instructor-profile.html"><img src="{{asset('assets/img/user/user4.jpg')}}" alt="Img" class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="instructor-profile.html">Nicole Brown</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text"><a href="course-details.html">Learn Angular Fundamentals From beginning to advance lavel</a></h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-01.svg')}}" alt="Img">
                                                    <p>15+ Lesson</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-02.svg')}}" alt="Img">
                                                    <p>80hr 40min</p>
                                                </div>
                                            </div>
                                            <div class="rating mb-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating"><span>4.0</span> (10)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Course Grid -->

                            <!-- Course Grid -->
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="course-details.html">
                                                <img class="img-fluid" alt="Img" src="{{asset('assets/img/course/course-07.jpg')}}">
                                            </a>
                                            <div class="price">
                                                <h3>$70 <span>$80.00</span></h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="instructor-profile.html"><img src="{{asset('assets/img/user/user6.jpg')}}" alt="Img" class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="instructor-profile.html">Stella Johnson</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text"><a href="course-details.html">Learn JavaScript and Express to become a Expert</a></h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-01.svg')}}" alt="Img">
                                                    <p>15+ Lesson</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-02.svg')}}" alt="Img">
                                                    <p>70hr 30min</p>
                                                </div>
                                            </div>
                                            <div class="rating mb-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating"><span>4.6</span> (15)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Course Grid -->

                        </div>
                    </div>

                    <div class="tab-pane fade" id="complete-courses">
                        <div class="row">

                            <!-- Course Grid -->
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="course-details.html">
                                                <img class="img-fluid" alt="Img" src="{{asset('assets/img/course/course-03.jpg')}}">
                                            </a>
                                            <div class="price combo">
                                                <h3>FREE</h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="instructor-profile.html"><img src="{{asset('assets/img/user/user5.jpg')}}" alt="Img" class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="instructor-profile.html">Jenny</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                                <div class="course-share d-flex align-items-center justify-content-center">
                                                    <a href="#"><i class="fa-regular fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text"><a href="course-details.html">Sketch from A to Z (2022): Become an app designer</a></h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-01.svg')}}" alt="Img">
                                                    <p>10+ Lesson</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="{{asset('assets/img/icon/icon-02.svg')}}" alt="Img">
                                                    <p>40hr 10min</p>
                                                </div>
                                            </div>
                                            <div class="rating mb-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating"><span>3.0</span> (18)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Course Grid -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dash-pagination">
        <div class="row align-items-center">
            <div class="col-6">
                <p>Page 1 of 2</p>
            </div>
            <div class="col-6">
                <ul class="pagination">
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#"><i class="bx bx-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- /Student Courses -->

</div>
</div>
</div>
@endsection
<!-- /Page Content -->
