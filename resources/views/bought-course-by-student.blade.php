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
                <div class="col-12">
                    <div class="container mx-auto">
                        
                        <p>Below are the programs for which you have enrolled in courses:</p>
                        
                        <div class="row">
                            @foreach ($enrollments as $enrollment)
                            <div class="col-12 mb-4">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        <h2 class="h5 font-weight-bold mb-2">Course: {{ $enrollment->course->title }}</h2>
                                        @foreach ($enrollment->course->modules as $module)
                                        <div class="mb-4">
                                            <div class="bg-light rounded shadow-sm p-4">
                                                <h3 class="h6 font-weight-bold mb-2">Module: {{ $module->title }}</h3>
                                                @foreach ($module->lessons as $lesson)
                                                <div class="mb-4">
                                                    <h4 class="h6 font-weight-bold mb-2">Lesson: {{ $lesson->title }}</h4>
                                                    <button class="btn btn-danger text-white px-4 py-2 rounded-md" onclick="toggleLesson(this)">Open Lesson</button>
                                                    <div class="lesson-content mt-2 d-none">
                                                        <div class="lesson-description mb-4">
                                                            <p>{!! $lesson->content !!}</p>
                                                        </div>
                                                        <div class="lesson-materials">
                                                            <h5 class="h6 font-weight-bold mb-2">Materials:</h5>
                                                            <ul class="list-unstyled">
                                                                @foreach ($lesson->materials as $material)
                                                                <li class="lesson-material d-flex align-items-center mb-2">
                                                                    @if ($material->file_path)
                                                                    <a href="{{ route('materials.download', $material->id) }}" class="btn btn-primary text-white font-weight-light py-1 px-3 rounded-md text-sm mr-2">Download</a>
                                                                    @endif
                                                                    &nbsp;<span class="material-title">{{ $material->title }}</span>
                                                                    [<span class="material-type text-muted">{{ $material->type }}</span>]
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
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

<script>
    function toggleLesson(button) {
        const lessonContent = button.nextElementSibling;
        const allLessonContents = document.querySelectorAll('.lesson-content');

        // Close all other lesson contents
        allLessonContents.forEach(content => {
            if (content !== lessonContent && !content.classList.contains('d-none')) {
                content.classList.add('d-none');
                const toggleButton = content.previousElementSibling.querySelector('button');
                if (toggleButton) {
                    toggleButton.textContent = 'Open Lesson';
                }
            }
        });

        // Toggle the clicked lesson content
        lessonContent.classList.toggle('d-none');
        button.textContent = lessonContent.classList.contains('d-none') ? 'Open Lesson' : 'Close Lesson';
    }
</script>
@endsection
