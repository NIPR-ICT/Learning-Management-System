@extends('welcome')

@section('content')

<div class="breadcrumb-bar py-5"></div>
@include('components.sweetalert')
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
                <div class="container bg-white p-3">
                    <h4>{{$stage}}: {{ $module->title }}</h4>
                    @foreach($module->quizzes as $quiz)
                        <h3>{{ $quiz->title }}</h3>  
                        <form action="{{ route('submit.assessment', $quiz->id) }}" method="POST">
                            @csrf
                            @foreach($quiz->questions as $question)
                                <div class="mb-4">
                                    <p>{{ $loop->iteration }}. {{ $question->question }}</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_a" value="{{ $question->option_a }}" required>
                                        <label class="form-check-label" for="answer_{{ $question->id }}_a">{{ $question->option_a }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_b" value="{{ $question->option_b }}" required>
                                        <label class="form-check-label" for="answer_{{ $question->id }}_b">{{ $question->option_b }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_c" value="{{ $question->option_c }}" required>
                                        <label class="form-check-label" for="answer_{{ $question->id }}_c">{{ $question->option_c }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_d" value="{{ $question->option_d }}" required>
                                        <label class="form-check-label" for="answer_{{ $question->id }}_d">{{ $question->option_d }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <input type="hidden" name="stage" value="{{ $stage }}">
                            <input type="hidden" name="module_id" value="{{ $moduleId }}">
                            <button type="submit" class="btn btn-primary">Submit Quiz</button>
                        </form>
                    @endforeach
                </div>
            </div>
            <!-- /Student Dashboard -->
        </div>
    </div>
</div>

@endsection
