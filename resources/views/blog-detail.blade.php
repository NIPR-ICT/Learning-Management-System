@extends('welcome')

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bar-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 pt-5">
                    <div class="breadcrumb-list pt-5">
                        <h2 class="breadcrumb-title">Blog</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog.view') }}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Course -->
    <section class="course-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    @if (empty($blog))
                        <p>No Article added yet, Please Try again Later :</p>
                    @else
                        <!-- Blog Post -->
                        <div class="blog">
                            <div class="blog-image">
                                <img class="img-fluid" src="{{ url('storage/' . $blog->image) }}" alt="Post Image">
                            </div>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><img class="img-fluid" src="{{ asset('assets/img/icon/icon-22.svg')}}" alt="Img">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans()  }}</li>
                                        <li><img class="img-fluid" src="{{ asset('assets/img/icon/icon-23.svg')}}" alt="Img">{{ $blog->category->title }}</li>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="blog-title">{{ $blog->title }}</h3>
                            <div class="blog-content blog-read">
                                <p>{!! $blog->body !!}</p>
                            </div>
                        </div>
                        <!-- /Blog Post -->


                    @endif
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
                                            <a href="{{ route('blog-detail.view', $item->slug) }}">
                                                <img class="img-fluid" src="{{ url('storage/'.$item->image) }}" alt="Img">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <h4>
                                                <a href="{{ route('blog-detail.view', $item->slug) }}">{{ $item->title }}</a>
                                            </h4>
                                            <p><img class="img-fluid" src="{{ asset('assets/img/icon/icon-22.svg') }}" alt="Img">{{ $item->published_at }}</p>
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
                                    <li><a href="{{ route('blog-category.view', $item->id) }}"><i class="fas fa-angle-right"></i> {{ $item->title }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /Categories -->

                </div>
                <!-- /Blog Sidebar -->

            </div>
        </div>
    </section>
    <!-- /Course -->
@endsection
