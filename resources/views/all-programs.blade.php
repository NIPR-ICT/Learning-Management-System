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
                @if (count($programs) > 0)
                    <div class="settings-widget card-details">
                        <div class="settings-menu p-0">
                            <div class="profile-heading">
                                <h3>Programmes</h3>
                            </div>
                        </div>
                    </div>

                    @foreach ($programs as $program)
                        <div class="instructor-list flex-fill">
                            <div class="instructor-content">
                                <h5><a href="#">{{ $program->title }}</a></h5>
                                <h6>{{ Str::words($program->description, 25, '...') }}</h6>
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
                                @if ($program->disable)
                                    <button class="btn btn-secondary" disabled>Unavailable</button>
                                @elseif (!$program->is_enrolled)
                                    <a href="{{ route('program.part.student', $program->id) }}" class="btn btn-primary">Enroll</a>
                                @elseif ($program->is_enrolled && !$program->all_parts_enrolled)
                                    <a href="{{ route('program.part.student', $program->id) }}" class="btn btn-primary">Continue Enrollment</a>
                                @elseif ($program->all_parts_enrolled)
                                @php
                                $started = \App\Models\Enrollment::where([['user_id', auth()->user()->id], ['program_id',  $program->id]])->first();
                            @endphp
                            @if (!empty($started))
                                <form id="start-program-form-{{ $program->id }}" action="{{ route('program.start') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                    <button type="submit" class="btn btn-primary">Start Program</button>
                                </form>
                            @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="settings-widget card-details">
                        <div class="settings-menu p-0">
                            <div class="profile-heading">
                                <h3>Programmes</h3>
                            </div>
                            <div class="checkout-form">
                                <h6>No programme added yet :( Please try again later)</h6>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Pagination links -->
                {{-- {{ $programs->links() }} --}}
            </div>
            <!-- /Student Dashboard -->

        </div>
    </div>
</div>
@endsection
