@extends('welcome')

@section('content')
<div class="breadcrumb-bar py-5"></div>

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
                @if ($parts->isEmpty())
                    <div class="settings-widget card-details">
                        <div class="settings-menu p-0">
                            <div class="profile-heading">
                                <h3>Parts</h3>
                            </div>
                            <div class="checkout-form">
                                <h6>No parts available :( Please try again later)</h6>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="settings-widget card-details">
                        <div class="settings-menu p-0">
                            <div class="profile-heading">
                                <p>Select Level for the Program you want. Note: The level are arrange in first to last order.</p>
                            </div>
                        </div>
                    </div>
                
                    @foreach ($parts as $part)
                        <div class="instructor-list flex-fill">
                            <div class="instructor-content">
                                <h5>{{ $part->name }} of {{ $part->program->title }}</h5>
                                <div class="d-flex gap-3 mb-4 text-xs">
                                    <p class="text-muted"><strong>Max Credit:</strong> {{ $part->max_credit }}</p>
                                    <p class="text-muted"><strong>Min Credit:</strong> {{ $part->min_credit }}</p>
                                    <p class="text-muted"><strong>Duration:</strong> {{ $part->program_duration }}</p>
                                </div>
                                
                                <p>{{ Str::words($part->description, 25, '...') }}</p>
                                <div class="instructor-info">
                                    <div class="rating-img d-flex align-items-center">
                                        <p>12+ Lessons</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center ms-0">
                                        <p>9hr 30min</p>
                                    </div>
                                    <div class="rating-img d-flex align-items-center">
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
                                @if ($part->disable)
                                    <button class="btn btn-secondary" disabled title="You have to Enroll for the Top One">Enroll</button>
                                @elseif (!$part->is_enrolled)
                                    <a href="{{ route('course.register.student', $part->id) }}" class="btn btn-primary">Enroll</a>
                                @else
                                <a href="{{ route('list.courses', $part->id) }}" class="btn btn-primary">Start Lesson</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
                
                {{-- {{ $parts->links() }} --}}
            </div>
            <!-- /Student Dashboard -->

        </div>
    </div>
</div>
@endsection
