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
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <!-- FontAwesome Icon -->
                                @if($preAssessmentCompleted)
                                <i class="fas fa-check-circle mr-2"></i>&nbsp;
                                @else
                                <i class="fas fa-circle-notch mr-2"></i>&nbsp;
                                @endif
                                <!-- Lesson Title -->
                                <p class="mb-0">Pre Assessment Exercise</p>
                            </div>
                            <a href="{{route('take.assessment', ['id' => $module_id, 'stage'=>'pre-assessment'])}}" class="btn btn-primary">Start</a>
                        </div>
                        @foreach ($lessons as $lesson)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <!-- FontAwesome Icon -->
                                @if($existingProgress->contains('lesson_id', $lesson->id))
                                <i class="fas fa-check-circle mr-2"></i>&nbsp;
                                @else
                                <i class="fas fa-circle-notch mr-2"></i>&nbsp;
                                @endif
                                <!-- Lesson Title -->
                                <p class="mb-0">{{ $lesson->title }} {{$lesson->order++}}/{{$lessonCount++}}</p>
                            </div>
                            <a href="{{route('bought.lesson.details', $lesson->id)}}" class="btn btn-primary">Start</a>
                        </div>
                        @endforeach
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                 @if($postAssessmentCompleted)
                                <i class="fas fa-check-circle mr-2"></i>&nbsp;
                                @else
                                <i class="fas fa-circle-notch mr-2"></i>&nbsp;
                                @endif
                                <!-- Lesson Title -->
                                <p class="mb-0">Post Assessment Exercise</p>
                            </div>
                            <a href="{{route('take.assessment', ['id' => $module_id, 'stage'=>'post-assessment'])}}" class="btn btn-primary">Start</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
