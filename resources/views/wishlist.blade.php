@extends('welcome')

	<!-- Breadcrumb -->
    <div class="breadcrumb-bar breadcrumb-bar-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 pt-5">
                    <div class="breadcrumb-list pt-5">
                        <h2 class="breadcrumb-title">Wishlist</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
  @section('content')
<section class="course-content">
    <div class="container">

        <div class="card wish-card">
        <div class="card-header">
            <h5>Your Wishlist ({{ $wishQty }} items)</h5>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                  @foreach ($wishlist as $item)
                  {{-- @php
                      dd($item->course->title);
                  @endphp --}}

                <div class="wishlist-item">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="wishlist-detail">
                                <div class="wishlist-img">
                                    <a href="course-details.html">
                                        <img alt="Img" src="{{ url('storage/'.$item->course->cover_image ) }}">
                                    </a>
                                    <div class="price-amt">
                                        <h4>
                                            &#8358; {{ $item->course->course_amount }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="wishlist-info">
                                    <h5><a href="course-details.html">
                                        {{ $item->course->title }}
                                    </a></h5>
                                    <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="assets/img/icon/icon-01.svg" alt="Img">
                                            <p>{{ count($item->modules) }}+ Lesson</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <img src="assets/img/icon/icon-02.svg" alt="Img">
                                            <p>9hr 30min</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- <div class="remove-btn">
                                <a href="javascript:void(0);" class="btn">Remove</a>
                            </div> --}}
                            <a href="" id="{{$item->id}}" onclick="wishlistRemove(this.id)" class="btn btn-danger">Remove</a>
                            <a href="" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
	</div>
    </div>
    </div>
    </section>

@endsection
