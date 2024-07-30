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

                <div class="container mt-5">
                    <h4 class="mb-4">Lesson</h4>
                    <div class="list-group">
                        @foreach ($lessons as $lesson)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <!-- FontAwesome Icon -->
                                <i class="fas fa-check-circle mr-2"></i>&nbsp;
                                <!-- Lesson Title -->
                                <p class="mb-0">{{ $lesson->title }} {{$lesson->order}}/10</p>
                            </div>
                            <a href="{{route('bought.lesson.details', $lesson->id)}}" class="btn btn-primary">Start</a>
                        </div>
                        @endforeach
                        <!-- Add more courses as needed -->
                    </div>
                </div>

            </div>
    </div>
</div>

@endsection