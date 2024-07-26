@extends('welcome')

	<!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bar-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 pt-5">
                    <div class="breadcrumb-list pt-5">
                        <h2 class="breadcrumb-title">Blog</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
						<div class="col-lg-9 col-md-12">
                            @if ($blogs->isEmpty())
                            <p>No Article added yet, Please Try again Later :(</p>
                            @endif
                            @foreach ($blogs as $item)
							<!-- Blog Post -->
							<div class="blog">
								<div class="blog-image">
									<a href="{{ route('blog-detail.view',$item->slug) }}"><img class="img-fluid" src="{{ url('storag/'.$item->image) }}" alt="Post Image"></a>
								</div>
								<div class="blog-info clearfix">
									<div class="post-left">
										<ul>
											{{-- <li>
												<div class="post-author">
													<a href="instructor-profile.html"><img src="assets/img/user/user.jpg" alt="Post Author"> <span>Ruby Perrin</span></a>
												</div>
											</li> --}}
											<li><img class="img-fluid" src="assets/img/icon/icon-22.svg" alt="Img">{{ $item->published_at->diffForHumans() }}</li>
											<li><img class="img-fluid" src="assets/img/icon/icon-23.svg" alt="Img">{{ $item->blogCategory->title }}</li>
										</ul>
									</div>
								</div>
								<h3 class="blog-title"><a href="blog-details.html">{{ $item->title }}</a></h3>
								<div class="blog-content blog-read">
									<p>{{ Str::words($item->body, 25, '...') }}</p>
									<a href="{{ route('blog-detail.view',$item->slug) }}" class="read-more btn btn-primary">Read More</a>
								</div>
							</div>
                            @endforeach
							<!-- /Blog Post -->


							<!-- Blog pagination -->
						{{ $blogs->links() }}
							<!-- /Blog pagination -->

						</div>

						<!-- Blog Sidebar -->
						<div class="col-lg-3 col-md-12 sidebar-right theiaStickySidebar">

							<!-- Search -->
							<div class="card search-widget blog-search blog-widget">
								<div class="card-body">
									<form class="search-form">
										<div class="input-group">
											<input type="text" placeholder="Search..." class="form-control">
											<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
										</div>
									</form>
								</div>
							</div>
							<!-- /Search -->

							<!-- Latest Posts -->
							<div class="card post-widget blog-widget">
								<div class="card-header">
									<h4 class="card-title">Recent Posts</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">
                                        @php
                                            $recentBlog = App\Models\Blog::latest()->take(3)->get();
                                        @endphp
                                        @foreach ($recentBlog as $item)
										<li>
											<div class="post-thumb">
												<a href="{{ route('blog-detail.view', $item->slug )}}">
													<img class="img-fluid" src="{{ url('storage/'.$item->image) }}" alt="Img">
												</a>
											</div>
											<div class="post-info">
												<h4>
													<a href="{{ route('blog-detail.view', $item->slug )}}">{{ $item->title }}</a>
												</h4>
												<p><img class="img-fluid" src="assets/img/icon/icon-22.svg" alt="Img">{{ $item->published_at->diffForHumans() }}</p>
											</div>
										</li>
                                        @endforeach

									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

							<!-- Categories -->
							<div class="card category-widget blog-widget">
								<div class="card-header">
									<h4 class="card-title">Categories</h4>
								</div>
								<div class="card-body">
									<ul class="categories">
                                        @foreach ($cats as $item)
										<li><a href="{{ route('blog-category.view',$item->id) }}"><i class="fas fa-angle-right"></i> {{ $item->title }} </a></li>
                                        @endforeach
									</ul>
								</div>
							</div>
							<!-- /Categories -->

							<!-- Archives Categories -->
							{{-- <div class="card category-widget blog-widget">
								<div class="card-header">
									<h4 class="card-title">Archives</h4>
								</div>
								<div class="card-body">
									<ul class="categories">
										<li><a href="javascript:void(0);"><i class="fas fa-angle-right"></i> January 2022 </a></li>
										<li><a href="javascript:void(0);"><i class="fas fa-angle-right"></i> February 2022 </a></li>
										<li><a href="javascript:void(0);"><i class="fas fa-angle-right"></i> April 2022 </a></li>
									</ul>
								</div>
							</div> --}}
							<!-- /Archives Categories -->

							<!-- Tags -->
							{{-- <div class="card tags-widget blog-widget tags-card">
								<div class="card-header">
									<h4 class="card-title">Latest Tags</h4>
								</div>
								<div class="card-body">
									<ul class="tags">
										<li><a href="javascript:void(0);" class="tag">HTML</a></li>
										<li><a href="javascript:void(0);" class="tag">Java Script</a></li>
										<li><a href="javascript:void(0);" class="tag">Css</a></li>
										<li><a href="javascript:void(0);" class="tag">Jquery</a></li>
										<li><a href="javascript:void(0);" class="tag">Java</a></li>
										<li><a href="javascript:void(0);" class="tag">React</a></li>
									</ul>
								</div>
							</div> --}}
							<!-- /Tags -->

						</div>
						<!-- /Blog Sidebar -->

					</div>
				</div>
			</section>
			<!-- /Course -->
  @endsection
