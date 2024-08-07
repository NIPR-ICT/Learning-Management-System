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
                            <div class="review-wrap">
                                <div class="review-rating">
                                     <i>Submit a New Review</i>
                                     <button class="btn btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#exampleModal2">Add Review</button>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Review</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('review.store') }}" method="POST" >
                                            @csrf


                                    <div class="form-group">
                                        <label for="name">Course</label>
                                        <select name="course_id" required id="" class="form-select select">
                                            <option  value="">Select One</option>
                                            @foreach ($courses as $item )
                                            <option  value="{{ $item->course->id }}">{{ $item->course->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Rating</label>
                                        <input type="range" name="rating" min="1" max="5" step="1" value="4" required class="form-range range"onchange="updateTextInput(this.value);">
                                        <input type="text" id="textInput" style="border: 0ch" value="4">
                                        <div class="reviewer-rating">
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star "></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <textarea name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                            @php
                                // dd($courses);
                            @endphp
                            @foreach ($reviews as $item)
                            <!-- Review -->
                            <div class="review-wrap">
                                <div class="review-user-info">
                                    <div class="reviewer">
                                        {{-- <div class="review-img">
                                            <a href="javascript:void(0);"><img src="assets/img/user/user16.jpg" alt="img"></a>
                                        </div> --}}
                                        <div class="reviewer-info">
                                            <h6><a href="javascript:void(0);">{{ $item->course->title}}</a></h6>
                                            <p>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()  }}</p>
                                        </div>
                                    </div>
                                    <div class="reviewer-rating">
                                        @if ($item->rating == 5)
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        @endif
                                        @if ($item->rating == 4)
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star "></i>
                                        @endif
                                        @if ($item->rating == 3)
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star "></i>
                                        <i class="fa-solid fa-star "></i>
                                        @endif
                                        @if ($item->rating == 2)
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star "></i>
                                        <i class="fa-solid fa-star "></i>
                                        <i class="fa-solid fa-star "></i>
                                        @endif
                                        @if ($item->rating == 1)
                                        <i class="fa-solid fa-star filled"></i>
                                        <i class="fa-solid fa-star "></i>
                                        <i class="fa-solid fa-star "></i>
                                        <i class="fa-solid fa-star "></i>
                                        <i class="fa-solid fa-star "></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p>{{ $item->comment }}</p>
                                    <div class="review-action">
                                        {{-- <a href="javascript:void(0);">Edit</a>
                                        <a href="javascript:void(0);">Delete</a> --}}
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <!-- /Review -->



                        </div>
                    </div>
                </div>

                <div class="dash-pagination">
                    <div class="row align-items-center">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
            <!-- Student Dashboard -->
        </div>
    </div>
</div>
<script>
    function updateTextInput(val) {
          document.getElementById('textInput').value=val;
        }
</script>
@endsection
<!-- /Page Content -->
