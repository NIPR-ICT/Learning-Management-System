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
                                <li class="breadcrumb-item active" aria-current="page">Course</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
  @section('content')
    <!-- Course -->
			<section class="course-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-9">

							<!-- Filter -->
							<div class="showing-list">
								<div class="row">
									<div class="col-lg-6">
										<div class="d-flex align-items-center">
											<div class="view-icons">
												<a href="course-grid.html" class="grid-view active"><i class="feather-grid"></i></a>
												<a href="course-list.html" class="list-view"><i class="feather-list"></i></a>
											</div>
											<div class="show-result">
												<h4>Showing  results</h4>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="show-filter add-course-info">
											<form action="#">
												<div class="row gx-2 align-items-center">
													<div class="col-md-6 col-item">
														<div class=" search-group">
															<i class="feather-search"></i>
															<input type="text" class="form-control" placeholder="Search our courses" >
														</div>
													</div>
													{{-- <div class="col-md-6 col-lg-6 col-item">
														<div class="input-block select-form mb-0">
															<select class="form-select select" id="sel1" name="sellist1">
															  <option>Newly published </option>
															  <option>published 1</option>
															  <option>published 2</option>
															  <option>published 3</option>
															</select>
														</div>
													</div> --}}

												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /Filter -->

							<div class="row">
                                @php
                                    // dd($courses);
                                @endphp
                                @foreach ($courses as $item)

								<div class="col-lg-4 col-md-6 d-flex">
									<div class="course-box course-design d-flex " >
										<div class="product">
											<div class="product-img">
												<a href="course-details.html">
													<img class="img-fluid" alt="Img" src="storage/{{ $item->cover_image }}">
												</a>
												<div class="price">
													<h3>{{ $item->course_amount }}</h3>
												</div>
											</div>
											<div class="product-content">
												<div class="course-group d-flex">
													<div class="course-group-img d-flex">
														<a href="instructor-profile.html">
                                                            <img src="@if(Str::length($item->creator->image)<1)
                                                            {{asset('assets/img/user/user11.jpg')}}
                                                            @else
                                                            {{ url('storage/'.$item->creator->image) }}
                                                            @endif" alt="Img" class="img-fluid"></a>
														<div class="course-name">
															<h4><a href="instructor-profile.html">{{ $item->creator->name }}</a></h4>
															<p>{{ $item->creator->role }}</p>
														</div>
													</div>
													<div class="course-share d-flex align-items-center justify-content-center">
														<a href="#rate"  id="{{ $item->id }}" onclick="addToWishList(this.id)"  title="Add to wishlist"><i class="fa-regular fa-heart"></i></a>
													</div>
												</div>
												<h3 class="title"><a href="{{ route('course.details.view',[$item->id,$item->slug]) }}">{{ $item->title }}</a></h3>
												<div class="course-info d-flex align-items-center">
													<div class="rating-img d-flex align-items-center">
														<img src="assets/img/icon/icon-01.svg" alt="Img">
														<p>{{ count($item->modules) }}+ Modules</p>
													</div>
													<div class="course-view d-flex align-items-center">
														{{-- <img src="assets/img/icon/icon-02.svg" alt="Img">
														<p>9hr 30min</p> --}}
													</div>
												</div>
												<div class="rating">

                                            @if (count($item->rating) > 0)
                                                    @php
                                                    $rating = round(($item->rating->sum('rating') / count($item->rating)), 1);
                                                @endphp
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
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star"></i>
                                                @elseif ($rating >= 2)
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star"></i>
                                                @else

                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star"></i>
                                                @endif
                                            @else

                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            @endif
													<span class="d-inline-block average-rating"><span>
                                                        {{-- {{
                                                    round(
                                                        ( $item->rating->sum('rating') && $item->rating->sum('rating') > 0 )? $item->rating->sum('rating'):5 / (count($item->rating) && count($item->rating) > 0 )? 1 : count($item->rating)), 1)
                                                     }} --}}
                                                @if (count($item->rating) > 0)
                                                    @php
                                                    $rating = round(($item->rating->sum('rating') / (count($item->rating))? 1 : count($item->rating)), 1);
                                                 @endphp
                                                 @endif
                                                     </span> ({{ count($item->rating) }})</span>
												</div>
												@if($item->standalone==1):
												<div class="all-btn all-category d-flex align-items-center">
                                                    <button title="Add to cart"   onclick="addToCart({{ $item->id }},'{{ $item->creator->name }}','{{ $item->slug }}','{{ $item->title }}' )"  class="btn btn-primary">
                                                        {{-- <img width="30px" src="{{asset('assets/img/icon/cart.svg')}}" alt="img"> --}}
                                                        <i class="fa fa-shopping-cart" ></i>
                                                    </button>
													{{-- <a href="checkout.html" class="btn btn-primary">BUY NOW</a> --}}
												</div>
												@else
												<a href="{{ route('course.details.view',[$item->id,$item->slug]) }}" class="btn btn-primary border-rounded">Course Details</a>
												@endif
											</div>
										</div>
									</div>
								</div>
								   @endforeach
							</div>

							<!-- /pagination -->
							 {{ $courses->links('pagination::bootstrap-4') }}
							<!-- /pagination -->

						</div>
						<div class="col-lg-3 theiaStickySidebar">
							<div class="filter-clear">
								<div class="clear-filter d-flex align-items-center">
									<h4><i class="feather-filter"></i>Filters</h4>
									<div class="clear-text">
										<p>CLEAR</p>
									</div>
								</div>

								<!-- Search Filter -->
								<div class="card search-filter">
									<div class="card-body">
										<div class="filter-widget mb-0">
											<div class="categories-head d-flex align-items-center">
												<h4>Program(Level)</h4>
												<i class="fas fa-angle-down"></i>
											</div>
                                            @foreach ($programs as $item)
											<div>
												<label class="custom_check">
													<input type="checkbox" name="select_specialist" >
													<span class="checkmark"></span> {{ $item->title.'('.$item->part->count().')' }}
												</label>
											</div>
                                            @endforeach

										</div>
									</div>
								</div>
								<!-- /Search Filter -->


								<!-- Search Filter -->
								<div class="card search-filter ">
									<div class="card-body">
										<div class="filter-widget mb-0">
											<div class="categories-head d-flex align-items-center">
												<h4>Price</h4>
												<i class="fas fa-angle-down"></i>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="radio" name="select_specialist" >
													<span class="checkmark"></span> All

												</label>
											</div>
											<div>
												<label class="custom_check custom_one">
													<input type="radio" name="select_specialist" >
													<span class="checkmark"></span>  Free

												</label>
											</div>
											<div>
												<label class="custom_check custom_one mb-0">
													<input type="radio" name="select_specialist" checked>
													<span class="checkmark"></span>  Paid
												</label>
											</div>
										</div>
									</div>
								</div>
								<!-- /Search Filter -->

								<!-- Latest Posts -->
								<div class="card post-widget ">
									<div class="card-body">
										<div class="latest-head">
											<h4 class="card-title">Latest Courses</h4>
										</div>
										<ul class="latest-posts">
                                            @php
                                                $recentCourse = \App\Models\Course::latest()->take(5)->get();
                                            @endphp
                                            @foreach ($recentCourse as $item)
											<li>
												<div class="post-thumb">
													<a href="{{ route('course.details.view',[$item->id,$item->slug]) }}">
														<img class="img-fluid" src="{{ url('storage/'.$item->cover_image )}}" alt="Img">
													</a>
												</div>
												<div class="post-info free-color">
													<h4>
														<a href="{{ route('course.details.view',[$item->id,$item->slug]) }}">{{ $item->title }}</a>
													</h4>
													<p>{{ $item->course_amount }}</p>
												</div>
											</li>
                                            @endforeach

										</ul>
									</div>
								</div>
								<!-- /Latest Posts -->

							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Course -->
  @endsection
