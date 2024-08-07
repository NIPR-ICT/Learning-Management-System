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
            <div class="col-xl-8 col-lg-8">
                <div class="container bg-white p-3">
                    <h2>{{ $stage }} Result</h2>

                    <div class="alert alert-info">
                        <strong>Score: </strong>{{ $score }}%
                    </div>

                    @foreach($module->quizzes as $quiz)
                        <h3>{{ $quiz->title }}</h3>
                        @foreach($quiz->questions as $question)
                            <div class="mb-3">
                                <p>{{ $question->question }}</p>
                                <ul>
                                    <li @if($userAnswers[$question->id] == $question->option_a && $question->correct_answer == $question->option_a) style="color: green;" 
                                        @elseif($userAnswers[$question->id] == $question->option_a) style="color: red;" @endif>
                                        {{ $question->option_a }}
                                        @if($question->correct_answer == $question->option_a) (Correct Answer) @endif
                                    </li>
                                    <li @if($userAnswers[$question->id] == $question->option_b && $question->correct_answer == $question->option_b) style="color: green;" 
                                        @elseif($userAnswers[$question->id] == $question->option_b) style="color: red;" @endif>
                                        {{ $question->option_b }}
                                        @if($question->correct_answer == $question->option_b) (Correct Answer) @endif
                                    </li>
                                    <li @if($userAnswers[$question->id] == $question->option_c && $question->correct_answer == $question->option_c) style="color: green;" 
                                        @elseif($userAnswers[$question->id] == $question->option_c) style="color: red;" @endif>
                                        {{ $question->option_c }}
                                        @if($question->correct_answer == $question->option_c) (Correct Answer) @endif
                                    </li>
                                    <li @if($userAnswers[$question->id] == $question->option_d && $question->correct_answer == $question->option_d) style="color: green;" 
                                        @elseif($userAnswers[$question->id] == $question->option_d) style="color: red;" @endif>
                                        {{ $question->option_d }}
                                        @if($question->correct_answer == $question->option_d) (Correct Answer) @endif
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    @endforeach

                    <a href="{{ route('bought.courses.list', ['id' => $module->id]) }}" class="btn btn-primary">Back to Modules</a>
                </div>
            </div>
            <!-- /Student Dashboard -->
        </div>
    </div>
</div>
@endsection
