@extends('welcome')
  @section('content')
			<!-- Home Banner -->
			<section class="home-slide d-flex align-items-center">
				<div class="container">
					<div class="row ">
						<div class="col-md-7">
							<div class="home-slide-face aos" data-aos="fade-up">
								<div class="home-slide-text ">
									<h5>The Uprising Leader in you </h5>
									<h1>Empower Your Potential with PRLA</h1>
									<p>Unleash the power of strategic communication and leadership</p>
								</div>
								<div class="banner-content">
									<form class="form"  action="{{route('course.view')}}">
										<div class="form-inner">
											<div class="input-group">
												<i class="fa-solid fa-magnifying-glass search-icon"></i>
												<input type="email" class="form-control" placeholder="Search School, Online eductional centers, etc">
												<span class="drop-detail">

													<select required class="form-select select">
                                                        <option value="" >Select Programme</option>
                                                        @foreach ($program as $item)
														<option>{{ $item->title }}</option>
                                                        @endforeach
													</select>
												</span>
												<button class="btn btn-primary sub-btn" type="submit"><i class="fas fa-arrow-right"></i></button>
											</div>
										</div>
									</form>
								</div>
								<div class="trust-user">
									<p>Trusted by over {{ $users }} Users <br>worldwide since 2022</p>
									<div class="trust-rating d-flex align-items-center">
										<div class="rate-head">
											<h2><span>{{ $reviewCount }}</span>+</h2>
										</div>
										<div class="rating d-flex align-items-center">
                                            @php
                                                $rating = round($reviewRating, 1);
                                            @endphp
											<h2 class="d-inline-block average-rating">{{ $rating }}</h2>
                                            @if ($rating == 5)
                                            <i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
                                            
                                            @elseif ($reviewRating >= 4)
                                            <i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star "></i>
                                            
                                            @elseif ($reviewRating >= 3)
                                            <i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
                                            
                                            @elseif ($reviewRating >= 2)
                                            <i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
                                            
                                            @else 
                                                 
                                            <i class="fas fa-star filled"></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
											<i class="fas fa-star "></i>
                                            @endif
                                            

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-5 d-flex align-items-center">
							<div class="girl-slide-img aos" data-aos="fade-up">
								<img style="width: 646px; height: 768px" src="assets/img/object.png" alt="Img">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
			<section class="section student-course">
				<div class="container">
					<div class="course-widget">
						<div class="row">
							<div class="col-lg-3 col-md-6">
								<div class="course-full-width">
									<div class="blur-border course-radius align-items-center aos" data-aos="fade-up">
										<div class="online-course d-flex align-items-center">
											<div class="course-img">
												<img src="assets/img/pencil-icon.svg" alt="Img">
											</div>
											<div class="course-inner-content">

												<h4><span>{{ $allCourse }}</span></h4>
												<p>Online Courses</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 d-flex">
								<div class="course-full-width">
									<div class="blur-border course-radius aos" data-aos="fade-up">
										<div class="online-course d-flex align-items-center">
											<div class="course-img">
												<img src="assets/img/cources-icon.svg" alt="Img">
											</div>
											<div class="course-inner-content">
												<h4><span> {{ count($trendingInstructor) }}</span>+</h4>
												<p>Expert Tutors</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 d-flex">
								<div class="course-full-width">
									<div class="blur-border course-radius aos" data-aos="fade-up">
										<div class="online-course d-flex align-items-center">
											<div class="course-img">
												<img src="assets/img/certificate-icon.svg" alt="Img">
											</div>
											<div class="course-inner-content">
												<h4><span>{{ count($program) }}</span>+</h4>
												<p>Ceritified Courses</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 d-flex">
								<div class="course-full-width">
									<div class="blur-border course-radius aos" data-aos="fade-up">
										<div class="online-course d-flex align-items-center">
											<div class="course-img">
												<img src="assets/img/gratuate-icon.svg" alt="Img">
											</div>
											<div class="course-inner-content">
												<h4><span>{{ $students }}</span>K +</h4>
												<p>Online Students</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Home Banner -->

			<!-- Top Categories -->
			<section class="section how-it-works">
				<div class="container">
					<div class="section-header aos" data-aos="fade-up">
						<div class="section-sub-head">
							<span>Favourite Course</span>
							<h2>Our Programmes</h2>
						</div>
						<div class="all-btn all-category d-flex align-items-center">
							<a href="#" class="btn btn-primary">All Programme</a>
						</div>
					</div>
					<div class="section-text aos" data-aos="fade-up">
						<p>PRLA offers a range of programs designed to elevate your public relations career.
                            From foundational knowledge to advanced leadership skills, our curriculum caters to professionals at every stage.</p>
					</div>
					<div class="owl-carousel mentoring-course owl-theme aos" data-aos="fade-up">
						@foreach ($program as $item)
                        <a href="{{ route('program', $item->id) }}">
                        <div class="feature-box text-center " >
							<div class="feature-bg" >
								<div class="feature-header">
									<div class="feature-icon">
										<img src="{{ url('storage/'.$item->cover_image) }}"  alt="{{ $item->title }}">
									</div>
									<div class="feature-cont">
										<div class="feature-text">{{ $item->title }}</div>
									</div>
								</div>
								<p>{{ $item->short_code }}</p>
							</div>
						</div>
                        </a>
                        @endforeach

					</div>
				</div>
			</section>
			<!-- /Top Categories -->

			<!-- Feature Course -->
			<section class="section new-course">
				<div class="container">
					<div class="section-header aos" data-aos="fade-up">
						<div class="section-sub-head">
							<span>What’s New</span>
							<h2>Our Courses</h2>
						</div>
						<div class="all-btn all-category d-flex align-items-center">
							<a href="{{route('course.view')}}" class="btn btn-primary">All Courses</a>
						</div>
					</div>
					<div class="section-text aos" data-aos="fade-up">
						<p class="mb-0">Explore our diverse course offerings that cover the core principles of public relations and leadership.
                            Gain practical insights, industry best practices, and the tools you need to excel in your career.</p>
					</div>
					<div class="course-feature">
						<div class="row">

                            @foreach ($courses as $item)
                                <div class="col-lg-4 col-md-6 d-flex">
                                        <div class="course-box d-flex aos" data-aos="fade-up">
                                            <div class="product">
                                                <div class="product-img">
                                                    <a href="course-details.html">
                                                        <img class="img-fluid" alt="Img" src="{{ url('storage/'.$item->cover_image) }}">
                                                    </a>
                                                    <div class="price">
                                                        {{-- <h3>$300 <span>$99.00</span></h3> --}}
                                                        <h3>&#8358;{{ $item->course_amount }} </h3>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="course-group d-flex">
                                                        <div class="course-group-img d-flex">
                                                            <a href="#"><img src="@if(Str::length($item->creator->image)<1)
                                                            {{asset('assets/img/user/user11.jpg')}}
                                                            @else
                                                            {{ url('storage/'.$item->creator->image) }}
                                                            @endif" alt="Img" class="img-fluid"></a>
                                                            <div class="course-name">
                                                                <h4><a href="#">{{ $item->creator->name}}  </a></h4>
                                                                <p>{{ $item->creator->role }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="course-share d-flex align-items-center justify-content-center">
                                                            <a  id="{{ $item->id }}" onclick="addToWishList(this.id)" href="javascript:void(0)" title="Add to wishlist"><i class="fa-regular fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <h3 class="title instructor-text"><a href="{{ route('course.details.view',[$item->id,$item->slug]) }}">{{ $item->title }}</a></h3>
                                                    <p>{{ $item->program->title }}</p>
                                                    <div class="course-info d-flex align-items-center">
                                                        <div class="rating-img d-flex align-items-center">
                                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                                            <p>{{ count($item->lessons)}}+ Lesson</p>
                                                        </div>
                                                        <div class="course-view d-flex align-items-center">
                                                            {{-- <img src="assets/img/icon/icon-02.svg" alt="Img">
                                                            <p>9hr 30min</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="rating m-0">
@php
    $ratingCount = count($item->rating);
    $rating = $ratingCount > 0 ? round(($item->rating->sum('rating') / $ratingCount), 1) : 0;
@endphp

@if ($ratingCount > 0)
    @if ($rating >= 5)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i> 
    @elseif ($rating >= 4)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
    @elseif ($rating >= 3)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @elseif ($rating >= 2)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @elseif ($rating >= 1)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @else
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @endif
@else
    <!-- No ratings available, show empty stars or a message -->
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
@endif
                                                            <span class="d-inline-block average-rating"><span>
                                                                {{(empty($rating))? '0': $rating }}</span> ({{ count($item->rating) }})
                                                            </span>
                                                        </div>
                                                        <div class="all-btn all-category d-flex align-items-center">
                                                            <button title="Add to cart"   onclick="addToCart({{ $item->id }},'{{ $item->creator->name }}','{{ $item->slug }}','{{ $item->title }}')"  class="btn btn-primary-presh">
                                                                {{-- <img width="30px" src="{{asset('assets/img/icon/cart.svg')}}" alt="img"/> --}}
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            {{-- <a href="checkout.html" class="btn btn-primary">BUY NOW</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach


						</div>
					</div>
				</div>
			</section>
			<!-- /Feature Course -->

			<!-- Master Skill -->
			<section class="section master-skill">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="section-header aos" data-aos="fade-up">
								<div class="section-sub-head">
									<span>What’s New</span>
									<h2>Stay Ahead of the Curve</h2>
								</div>
							</div>
							<div class="section-text aos" data-aos="fade-up">
								<p>Discover the latest trends, innovations, and developments in the dynamic world of public relations.
                                    Stay informed about industry updates, new courses, and upcoming events</p>
							</div>
							<div class="career-group aos" data-aos="fade-up">
								<div class="row">
									<div class="col-lg-6 col-md-6 d-flex">
										<div class="certified-group blur-border d-flex">
											<div class="get-certified d-flex align-items-center">
												<div class="blur-box">
													<div class="certified-img ">
														<img src="assets/img/icon/icon-1.svg" alt="Img" class="img-fluid">
													</div>
												</div>
												<p>Stay motivated with engaging instructors</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 d-flex">
										<div class="certified-group blur-border d-flex">
											<div class="get-certified d-flex align-items-center">
												<div class="blur-box">
													<div class="certified-img ">
														<img src="assets/img/icon/icon-2.svg" alt="Img" class="img-fluid">
													</div>
												</div>
												<p>Keep up with in the latest in cloud</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 d-flex">
										<div class="certified-group blur-border d-flex">
											<div class="get-certified d-flex align-items-center">
												<div class="blur-box">
													<div class="certified-img ">
														<img src="assets/img/icon/icon-3.svg" alt="Img" class="img-fluid">
													</div>
												</div>
												<p>Get certified with 50+ certification courses</p>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 d-flex">
										<div class="certified-group blur-border d-flex">
											<div class="get-certified d-flex align-items-center">
												<div class="blur-box">
													<div class="certified-img ">
														<img src="assets/img/icon/icon-4.svg" alt="Img" class="img-fluid">
													</div>
												</div>
												<p>Build skills your way, from labs to courses</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-md-12 d-flex align-items-end">
							<div class="career-img aos" data-aos="fade-up">
								<img src="assets/img/join.png" alt="Img" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Master Skill -->

			<!-- Trending Course -->
            @if (! $mostEnrolledCourses->isEmpty())

			<section class="section trend-course">
				<div class="container">
					<div class="section-header aos" data-aos="fade-up">
						<div class="section-sub-head">
							<span>What’s New</span>
							<h2>TRENDING COURSES</h2>
						</div>
						<div class="all-btn all-category d-flex align-items-center">
							<a href="{{route('course.view')}}" class="btn btn-primary">All Courses</a>
						</div>
					</div>
					<div class="section-text aos" data-aos="fade-up">
						<p class="mb-0">Explore our most popular courses that address the current needs of public relations professionals. Gain insights into the hottest topics and skills in demand.</p>
					</div>
					<div class="owl-carousel trending-course owl-theme aos" data-aos="fade-up">

						@foreach ($mostEnrolledCourses as $key => $item)
                        @php
                            $courses = \App\Models\Course::with('modules','creator','lessons','program','review')->where('id',$item->course_id)->first();

                        @endphp
                        <div class="course-box trend-box">
							<div class="product trend-product">
								<div class="product-img">
									<a href="course-details.html">
										<img class="img-fluid" alt="Img" src="{{ url('storage/'.$courses->cover_image) }}">
									</a>
									<div class="price">
										<h3> &#8358; {{ $courses->course_amount }}</h3>
									</div>
								</div>
								<div class="product-content">
									<div class="course-group d-flex">
										<div class="course-group-img d-flex">
											<a href="instructor-profile.html"><img src="@if(Str::length($courses->creator->image)<1)
                                                            {{asset('assets/img/user/user11.jpg')}}
                                                            @else
                                                            {{ url('storage/'.$courses->creator->image) }}
                                                            @endif" alt="Img" class="img-fluid"></a>
											<div class="course-name">
												<h4><a href="instructor-profile.html">{{ $courses->creator->name }} </a></h4>
												<p>{{ $courses->creator->role }}</p>
											</div>
										</div>
										<div class="course-share d-flex align-items-center justify-content-center">
											<a href="#"><i class="fa-regular fa-heart"></i></a>
										</div>
									</div>
									<h3 class="title"><a href="{{ route('course.details.view', [$courses->id, $courses->slug]) }}">{{ $courses->title }}</a></h3>
									<div class="course-info d-flex align-items-center">
										<div class="rating-img d-flex align-items-center">
											<img src="assets/img/icon/icon-01.svg" alt="Img" class="img-fluid">
											<p>{{ count($courses->lessons)}}+ Lesson</p>
										</div>
										<div class="course-view d-flex align-items-center">
											{{-- <img src="assets/img/icon/icon-02.svg" alt="Img" class="img-fluid">
											<p>10hr 30min</p> --}}
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="rating m-0">
                                            
@php
    $ratingCount = count($courses->rating);
    $rating = $ratingCount > 0 ? round(($courses->rating->sum('rating') / $ratingCount), 1) : 0;
@endphp

@if ($ratingCount > 0)
    @if ($rating >= 5)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i> 
    @elseif ($rating >= 4)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
    @elseif ($rating >= 3)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @elseif ($rating >= 2)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @elseif ($rating >= 1)
        <i class="fas fa-star filled"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @else
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    @endif
@else
    <!-- No ratings available, show empty stars or a message -->
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
@endif
  
                                        
											<span class="d-inline-block average-rating"><span>{{ $rating }}</span> ({{ count($courses->rating) }})</span>
										</div>
										<div class="all-btn all-category d-flex align-items-center">
											{{-- <a href="checkout.html" class="btn btn-primary">BUY NOW</a> --}}
                                            <button title="Add to cart"  onclick="addToCart({{ $courses->id }},'{{ $courses->creator->name }}','{{ $courses->slug }}','{{ $courses->title }}' )"  class="btn btn-primary-presh">
                                                <i class="fa fa-shopping-cart" style="color: #ef3333"></i>
                                                {{-- <img style="width: 30px" src="{{asset('assets/img/icon/cart.svg')}}" alt="img"/> --}}
                                                </button>

										</div>
									</div>
								</div>
							</div>
						</div>
                        @endforeach

					</div>

					<!-- Feature Instructors -->
                    @if (!$trendingInstructor->isEmpty())


					<div class="feature-instructors">
						<div class="section-header aos" data-aos="fade-up">
							<div class="section-sub-head feature-head text-center">
								<h2>Featured Instructor</h2>
								<div class="section-text aos" data-aos="fade-up">
									<p class="mb-0">
                                        Connect with experienced public relations professionals who can provide guidance, mentorship, and career advice.
                                        Benefit from their expertise and build valuable industry connections.</p>
								</div>
							</div>
						</div>
						<div class="owl-carousel instructors-course owl-theme aos" data-aos="fade-up">
							@foreach ($trendingInstructor as $item)
                                <div class="instructors-widget">
								<div class="instructors-img ">
									<a href="instructor-list.html">
										<img class="img-fluid" alt="Img" src="assets/img/user/user7.jpg">
									</a>
								</div>
								<div class="instructors-content text-center">
									<h5><a href="instructor-profile.html">{{ $item->name }}</a></h5>
									<p>{{ $item->course->first() }}</p>
									<div class="student-count d-flex justify-content-center">
										<i class="fa-solid fa-user-group"></i>
                                        @php
                                            $coutStudent = \App\Model\Enrollment::where('created_by', $item->id)->get();
                                        @endphp
										<span>{{ $count($coutStudent)}} Students</span>
									</div>
								</div>
							</div>
                            @endforeach


						</div>
					</div>
                    @endif
					<!-- /Feature Instructors -->

				</div>
			</section>
            @endif
			<!-- /Trending Course -->

			<!-- Leading Companies -->
            @if (!$partners->isEmpty())
			<section class="section lead-companies">
				<div class="container">
					<div class="section-header aos" data-aos="fade-up">
						<div class="section-sub-head feature-head text-center">
							<span>Trusted By</span>
							<h2>500+ Leading Universities And Companies</h2>
						</div>
					</div>
					<div class="lead-group aos" data-aos="fade-up">
						<div class="lead-group-slider owl-carousel owl-theme">
                            @foreach ($partners as $item)
							<div class="item">
                                <a href="{{ $item->url }}" target="_blank" rel="noopener noreferrer"></a>
								<div class="lead-img">
									<img class="img-fluid" height="{{ $item->width }}" width="{{ $item->height }}" alt="Img" src="{{ url('storage/'.$item->logo) }}">
								</div>
							</div>
                        @endforeach
						</div>
					</div>
				</div>
			</section>
            @endif
			<!-- /Leading Companies -->

			<!-- Share Knowledge -->
			<section class="section share-knowledge">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="knowledge-img aos" data-aos="fade-up">
								<img src="{{asset('assets/img/share.png')}}" alt="Img" class="img-fluid">
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-center">
							<div class="join-mentor aos" data-aos="fade-up">
								<h2>Want to share your knowledge? Join as a Mentor</h2>
								<p>High-definition video is video of higher resolution and quality than standard-definition. While there is no standardized meaning for high-definition, generally any video.</p>
								<ul class="course-list">
									<li><i class="fa-solid fa-circle-check"></i>Best Courses</li>
									<li><i class="fa-solid fa-circle-check"></i>Top rated Instructors</li>
								</ul>
								<div class="all-btn all-category d-flex align-items-center">
									<a href="#" class="btn btn-primary">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Share Knowledge -->

			<!-- Users Love -->
			<section class="section user-love">
				<div class="container">
					<div class="section-header white-header aos" data-aos="fade-up">
						<div class="section-sub-head feature-head text-center">
							<span>Check out these real reviews</span>
							<h2>Users-love-us Don't take it from us.</h2>
						</div>
					</div>
				</div>
			</section>
			<!-- /Users Love -->

			<!-- Say testimonial Four -->
			<section class="testimonial-four">
				<div class="review">
					<div class="container">
						<div class="testi-quotes">
							<img src="{{asset('assets/img/qute.png')}}" alt="Img" >
						</div>
						<div class="mentor-testimonial lazy slider aos" data-aos="fade-up" data-sizes="50vw ">
							<div class="d-flex justify-content-center">
								<div class="testimonial-all d-flex justify-content-center">
									<div class="testimonial-two-head text-center align-items-center d-flex">
										<div class="testimonial-four-saying ">
											<div class="testi-right">
												<img src="assets/img/qute-01.png" alt="Img">
											</div>
											<p>I have honestly been very satisfied with the results of my courses</p>
											<div class="four-testimonial-founder">
												<div class="fount-about-img">
													<a href="instructor-profile.html"><img src="assets/img/user/user1.jpg" alt="Img" class="img-fluid"></a>
												</div>
												<h3><a href="instructor-profile.html">Daziy Millar</a></h3>
												<span>Founder of Awesomeux Technology</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<div class="testimonial-all d-flex justify-content-center">
									<div class="testimonial-two-head text-center align-items-center d-flex">
										<div class="testimonial-four-saying ">
											<div class="testi-right">
												<img src="assets/img/qute-01.png" alt="Img">
											</div>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
											<div class="four-testimonial-founder">
												<div class="fount-about-img">
													<a href="instructor-profile.html"><img src="assets/img/user/user3.jpg" alt="Img" class="img-fluid"></a>
												</div>
												<h3><a href="instructor-profile.html">john smith</a></h3>
												<span>Founder of Awesomeux Technology</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<div class="testimonial-all d-flex justify-content-center">
									<div class="testimonial-two-head text-center align-items-center d-flex">
										<div class="testimonial-four-saying ">
											<div class="testi-right">
												<img src="assets/img/qute-01.png" alt="Img">
											</div>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
											<div class="four-testimonial-founder">
												<div class="fount-about-img">
													<a href="instructor-profile.html"><img src="assets/img/user/user2.jpg" alt="Img" class="img-fluid"></a>
												</div>
												<h3><a href="instructor-profile.html">David Lee</a></h3>
												<span>Founder of Awesomeux Technology</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Say testimonial Four -->

			<!-- Become An Instructor -->
			<section class="section become-instructors aos" data-aos="fade-up">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 d-flex">
							<div class="student-mentor cube-instuctor ">
								<h4>Become An Instructor</h4>
								<div class="row">
									<div class="col-lg-7 col-md-12">
										<div class="top-instructors">
											<p>Top instructors from around the world teach millions of students on Mentoring.</p>
										</div>
									</div>
									<div class="col-lg-5 col-md-12">
										<div class="mentor-img">
											<img class="img-fluid" alt="Img" src="assets/img/icon/become-02.svg">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 d-flex">
							<div class="student-mentor yellow-mentor">
								<h4>Transform Access To Education</h4>
								<div class="row">
									<div class="col-lg-8 col-md-12">
										<div class="top-instructors">
											<p>Create an account to receive our newsletter, course recommendations and promotions.</p>
										</div>
									</div>
									<div class="col-lg-4 col-md-12">
										<div class="mentor-img">
											<img class="img-fluid" alt="Img" src="assets/img/icon/become-01.svg">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Become An Instructor -->

			<!-- Latest Blog -->

			<section class="section latest-blog">
                <div class="container">
                    @if (!$blog->isEmpty())
					<div class="section-header aos" data-aos="fade-up">
						<div class="section-sub-head feature-head text-center mb-0">
							<h2>Latest Blogs</h2>
							<div class="section-text aos" data-aos="fade-up">
								<p class="mb-0">Our nonestop eyeopening and amazing happenings on recent news and trends.
                                    Stay informed and inspired as we explore the evolving landscape of public relations together. 
                                    Whether you're a seasoned professional or a budding PR enthusiast, our blog offers valuable content to support your journey in this dynamic field
                                </p>
							</div>
						</div>
					</div>
					<div class="owl-carousel blogs-slide owl-theme aos" data-aos="fade-up">
                        @foreach ($blog as $item)
						<div class="instructors-widget blog-widget">
							<div class="instructors-img">
								<a href="blog-list.html">
									<img class="img-fluid" alt="Img" src="{{ url('storage/'.$item->image) }}">
								</a>
							</div>
							<div class="instructors-content text-center">
								<h5><a href="{{ route('blog-detail.view', $item->slug) }}">{{ $item->title }}</a></h5>
								<p>{{ $item->category->title }}</p>
								<div class="student-count d-flex justify-content-center">
									<i class="fa-solid fa-calendar-days"></i>
									<span>{{ Carbon\Carbon::parse($item->published_at)->diffForHumans()  }}</span>
								</div>
							</div>
						</div>
                        @endforeach

					</div>

            @endif
					<div class="enroll-group aos" data-aos="fade-up">
						<div class="row ">
							<div class="col-lg-4 col-md-6">
								<div class="total-course d-flex align-items-center">
									<div class="blur-border">
										<div class="enroll-img ">
											<img src="assets/img/icon/icon-07.svg" alt="Img" class="img-fluid">
										</div>
									</div>
									<div class="course-count">
										<h3><span class="counterUp">{{ $enrolledStudent }}</span></h3>
										<p>STUDENTS ENROLLED</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="total-course d-flex align-items-center">
									<div class="blur-border">
										<div class="enroll-img ">
											<img src="assets/img/icon/icon-08.svg" alt="Img" class="img-fluid">
										</div>
									</div>
									<div class="course-count">
										<h3><span class="counterUp" >{{ $allCourse }}</span></h3>
										<p>TOTAL COURSES</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="total-course d-flex align-items-center">
									<div class="blur-border">
										<div class="enroll-img ">
											<img src="assets/img/icon/icon-09.svg" alt="Img" class="img-fluid">
										</div>
									</div>
									<div class="course-count">
										<h3><span class="counterUp" >1</span></h3>
										<p>COUNTRIES</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="lab-course">
						<div class="section-header aos" data-aos="fade-up">
							<div class="section-sub-head feature-head text-center">
								<h2>Unlimited access to courses <br>and 1,600+ meterials</h2>
							</div>
						</div>
						{{-- <div class="icon-group aos" data-aos="fade-up">
							<div class="offset-lg-1 col-lg-12">
								<div class="row">
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-09.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-10.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-16.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-12.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-13.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-14.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-15.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-16.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-17.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-1 col-3">
										<div class="total-course d-flex align-items-center">
											<div class="blur-border">
												<div class="enroll-img ">
													<img src="assets/img/icon/icon-18.svg" alt="Img" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
					</div>
				</div>
			</section>
			<!-- /Latest Blog -->
@endsection

