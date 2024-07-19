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
            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">

                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>Reviews</h3>
                        </div>
                        <div class="checkout-form">

                            <!-- Review -->
                            <div class="review-wrap">
                                <div class="review-user-info">
                                    <div class="reviewer">
                                        <div class="review-img">
                                            <a href="javascript:void(0);"><img src="assets/img/user/user16.jpg" alt="img"></a>
                                        </div>
                                        <div class="reviewer-info">
                                            <h6><a href="javascript:void(0);">Ronald Richard</a></h6>
                                            <p>6 months ago</p>
                                        </div>
                                    </div>
                                    <div class="reviewer-rating">
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>This is the second Photoshop course I have completed with Cristian. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the Beginner to Advanced course first. The sound and video quality is of a good standard. Thank you Cristian.</p>
                                    <div class="review-action">
                                        <a href="javascript:void(0);">Edit</a>
                                        <a href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Review -->

                            <!-- Review -->
                            <div class="review-wrap">
                                <div class="review-user-info">
                                    <div class="reviewer">
                                        <div class="review-img">
                                            <a href="javascript:void(0);"><img src="assets/img/user/user16.jpg" alt="img"></a>
                                        </div>
                                        <div class="reviewer-info">
                                            <h6><a href="javascript:void(0);">Ronald Richard</a></h6>
                                            <p>8 months ago</p>
                                        </div>
                                    </div>
                                    <div class="reviewer-rating">
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>I've been using this LMS for several months for my online courses, and it's been a game-changer. The interface is incredibly user-friendly, making it easy for both instructors and students to navigate through the courses. The variety of tools available for creating interactive and engaging content has significantly enhanced the learning experience.</p>
                                    <div class="review-action">
                                        <a href="javascript:void(0);">Edit</a>
                                        <a href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Review -->

                            <!-- Review -->
                            <div class="review-wrap">
                                <div class="review-user-info">
                                    <div class="reviewer">
                                        <div class="review-img">
                                            <a href="javascript:void(0);"><img src="assets/img/user/user16.jpg" alt="img"></a>
                                        </div>
                                        <div class="reviewer-info">
                                            <h6><a href="javascript:void(0);">Ronald Richard</a></h6>
                                            <p>9 months ago</p>
                                        </div>
                                    </div>
                                    <div class="reviewer-rating">
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>Any time I've had a question or encountered a minor issue, the customer support team has been quick to respond and incredibly helpful. Moreover, the reliability of this LMS has impressed me—downtime is nearly non-existent, ensuring that  students have access to their courses 24/7.</p>
                                    <div class="review-action">
                                        <a href="javascript:void(0);">Edit</a>
                                        <a href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Review -->

                            <!-- Review -->
                            <div class="review-wrap">
                                <div class="review-user-info">
                                    <div class="reviewer">
                                        <div class="review-img">
                                            <a href="javascript:void(0);"><img src="assets/img/user/user16.jpg" alt="img"></a>
                                        </div>
                                        <div class="reviewer-info">
                                            <h6><a href="javascript:void(0);">Ronald Richard</a></h6>
                                            <p>1 year ago</p>
                                        </div>
                                    </div>
                                    <div class="reviewer-rating">
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>From the onset, my experience with this LMS Website has been nothing short of extraordinary. As a learner who has navigated through various online platforms, the sophistication and user-centric design of this website set a new benchmark for what digital education should look like.</p>
                                    <div class="review-action">
                                        <a href="javascript:void(0);">Edit</a>
                                        <a href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Review -->

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
            <!-- Student Dashboard -->
        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->
