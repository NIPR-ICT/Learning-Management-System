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
            <!-- Student Wishlist -->
						<div class="col-xl-9 col-lg-9">

							<div class="settings-widget card-info">
								<div class="settings-menu p-0">
									<div class="profile-heading">
										<h3>Wishlist</h3>
									</div>
									<div class="checkout-form pb-0">
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
																	<a href="#"><i class="fa-regular fa-heart color-active"></i></a>
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
						<!-- /Student Wishlist -->


        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->
