@extends('welcome')

@section('content')
@include('components.sweetalert')
<style>
.card-custom {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    height: 220px;
}
.card-image {
    height: 200px;
    background-size: cover;
    background-position: center;
}
.progress {
    height: 5px;
    border-radius: 2.5px;
}
.progress-bar {
    background-color: #dc3545;
}
.author-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}
.author {
    display: flex;
    align-items: center;
}
.author img {
    margin-right: 10px;
}
</style>
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
                <div class="col-12 p-0">
                    <div class="container mx-auto">
                        <!-- Note -->
                        <p>The lists of Courses for Levels you are enrolled in.</p>

                        <div class="row">
                            @foreach ($enrollments as $part)
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                <div class="card card-custom shadow-sm">
                                    @if ($part->cover_image)
                                    <div class="card-image" style="background-image: url('{{ asset('storage/post_images/' . $part->cover_image) }}');"></div>
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $part->course->title }}</h5>
                                        <p>{{ Str::words($part->course->description, 4, '...') }}</p>
                                        <div class="author">
                                            {{-- <img src="path_to_author_image" alt="Author" class="author-avatar"> --}}
                                            <div class="ml-auto">
                                                <p class="mb-0 text-danger">{{ number_format($part->completion_percentage) }}% COMPLETE</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a href="{{ route('course.modules.enrollment', $part->course->id) }}" class="btn btn-primary">Start Course</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $enrollments->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Student Dashboard -->

        </div>
    </div>
</div>
@endsection
