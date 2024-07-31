@extends('welcome')
<div class="breadcrumb-bar py-5">
</div>
  @section('content')

<!-- Page Content -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-xl-3 col-lg-3">
                @include('includes.layout-frontend.side-bar')
            </div>
            <!-- /Sidebar -->

            <!-- Student Dashboard -->
            <div class="col-xl-9 col-lg-9">
                <div class="settings-widget card-details">
                    <div class="settings-menu p-0">
                        <div class="profile-heading">
                            <h3>My Programmes</h3>
                        </div>
                    </div>
                </div>

                @if (count($programs) > 0)
                    @foreach ($programs as $program)
                        <div class="instructor-list flex-fill">
                            <div class="instructor-img">
                                
                            </div>
                            <div class="instructor-content">
                                <h5><a href="#">{{ $program->title }}</a></h5>
                                <h6>{{ Str::words($program->description, 25, '...') }}</h6>
                                <div class="instructor-info">
                                    <div class="rating-img d-flex align-items-center">
                                        {{-- <img src="assets/img/icon/icon-01.svg" class="me-1" alt="Img"> --}}
                                        <p>12+ Lesson</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center ms-0">
                                        {{-- <img src="assets/img/icon/icon-02.svg" class="me-1" alt="Img"> --}}
                                        <p>9hr 30min</p>
                                    </div>
                                    <div class="rating-img d-flex align-items-center">
                                        {{-- <img src="assets/img/icon/user-icon.svg" class="me-1" alt="Img"> --}}
                                        <p>50 Students</p>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating"><span>4.0</span> (15)</span>
                                    </div>
                                    <a href="#rate" class="rating-count"><i class="fa-regular fa-heart"></i></a>
                                </div>
                                @php
                                    $started = \App\Models\Enrollment::where([['user_id', auth()->user()->id], ['program_id',  $program->id]])->first();
                                @endphp
                                @if (!empty($started))
                                <a href="{{ route('program.start', $program->id) }}" class="btn btn-primary">Start Program</a>
                                    {{-- <form id="start-program-form-{{ $program->id }}" action="{{ route('program.start') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                                        <button type="submit" class="btn btn-primary"></button>
                                    </form> --}}
                                @endif
                                <a href="#" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                    @endforeach
                    {{ $programs->links() }}
                @else
                    <div class="settings-widget card-details">
                        <div class="settings-menu p-0">
                            <div class="profile-heading">
                                <h3>My Programmes</h3>
                            </div>
                            <div class="checkout-form">
                                <h6>You have not purchased any Programme yet :( </h6>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- /Student Dashboard -->
        </div>
    </div>
</div>
@endsection
<!-- /Page Content -->
