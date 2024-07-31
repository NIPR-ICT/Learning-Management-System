@extends('welcome')
@section('content')
@include('components.sweetalert')

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

            <!-- Modules and Lessons -->
            <div class="col-xl-9 col-lg-9">
                <div class="modules-sidebar">
                    @foreach ($courses as $course)
                        <h5 class="h5 mb-4">{{ $course->title }} Modules</h5>
                    @foreach ($modules as $module)
                    <div class="card card-custom shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $module->title }}</h5>
                            <p>{{ Str::words($module->description, 4, '...') }}</p>
                            <div class="mt-0">
                                <a href="{{ route('bought.courses.list', $module->id) }}" class="btn btn-primary">Load Lessons</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Lessons Column -->
            {{-- <div class="col-xl-6 col-lg-6 lessons-content" id="lessons-column">
                <h3>Lessons</h3>
                <!-- Lessons will be dynamically loaded here -->
            </div> --}}
        </div>
    </div>
</div>

@endsection
