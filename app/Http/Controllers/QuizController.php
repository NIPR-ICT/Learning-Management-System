<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionsImport;
use App\Models\Quiz;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\Module;
use App\Models\UserQuizScore;
use Auth;

class QuizController extends Controller
{
    public function showImportForm($id)
    {
        $module = Module::findOrFail($id);
        return view('admin.import_form', compact('module'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'module_id' => 'required|unique:quizzes,module_id'
        ]);

        // dd($request);

        $file = $request->file('file');
        $moduleId = $request->input('module_id');
 
        // Create a new Quiz entry
        $quiz = Quiz::create([
            'module_id' => $moduleId,
        ]);

        // Import the file
        Excel::import(new QuestionsImport($quiz->id), $file);

        return redirect()->route('all.assessement')->with('alert', [
            'title' => 'success!',
            'text' => 'Questions imported successfully.',
            'icon' => 'success'
        ]);
    }

    public function showQuiz($stage, $moduleId)
    {
        $quizz = Quiz::where('module_id', $moduleId)->first();
       if($quizz){
        $quizID=$quizz->id;
        $user = Auth::user();
        $exists = UserQuizScore::where('user_id', $user->id)
                        ->where('quiz_id', $quizID)
                        ->where('stage', $stage)
                        ->exists();
       }
$exists = false;
if ($exists) {
    $module = Module::with('quizzes.questions')->find($moduleId);
    $userAnswers = UserAnswer::where('user_id', $user->id)
                                    ->where('stage', $stage)
                                    ->get()->keyBy('question_id')
                                    ->mapWithKeys(function ($item) {
                                        return [$item->question_id => $item->selected_answer];
                                    });

            $score = UserQuizScore::where('user_id', $user->id)
                                  ->where('quiz_id', $quizID)
                                  ->where('stage', $stage)
                                  ->value('score');

    return view('assessment-detail', [
        'module' => $module,
        'stage' => $stage,
        'score' => $score,
        'userAnswers' => $userAnswers
    ]);
} else {
    $module = Module::with('quizzes.questions')->find($moduleId);
    return view('quiz', ['module' => $module,'stage' => $stage, 'moduleId'=>$moduleId]);
}
    }

    public function submitQuiz(Request $request, $quizId)
{
    $quiz = Quiz::findOrFail($quizId);
    $user = Auth::user();
    $answers = $request->input('answers');
    $stage = $request->input('stage');
    $moduleId = $request->input('module_id');

    $module = Module::with('quizzes.questions')->findOrFail($moduleId);

    $correctAnswers = 0;
    $userAnswers = [];

    foreach ($answers as $questionId => $selectedAnswer) {
        $question = Question::findOrFail($questionId);
        $isCorrect = $question->correct_answer == $selectedAnswer;
        if ($isCorrect) {
            $correctAnswers++;
        }

        $userAnswers[$questionId] = $selectedAnswer;

        UserAnswer::create([
            'user_id' => $user->id,
            'question_id' => $question->id,
            'selected_answer' => $selectedAnswer,
            'score' => $isCorrect ? 1 : 0, // Store score (1 for correct, 0 for incorrect)
            'stage'=> $stage,
        ]);
    }

    $totalQuestions = count($answers);
    $scorePercentage = ($correctAnswers / $totalQuestions) * 100;

    if ($stage == 'pre-assessment') {
        UserQuizScore::create([
            'user_id' => $user->id,
            'quiz_id' => $quizId,
            'score' => $scorePercentage,
            'stage' => $stage
        ]);
    } elseif ($stage == 'post-assessment' && $scorePercentage >= 50) {
        UserQuizScore::create([
            'user_id' => $user->id,
            'quiz_id' => $quizId,
            'score' => $scorePercentage,
            'stage' => $stage
        ]);
    }elseif($scorePercentage<50){
        return redirect()->back()->with('alert', [
            'title' => 'Oops!',
            'text' => 'you scored '.$scorePercentage.' which is blow cut of mark of 50',
            'icon' => 'error'
        ]);
    }

    return view('quiz_result', [
        'quiz' => $quiz,
        'userAnswers' => $userAnswers,
        'score' => $scorePercentage,
        'stage' => $stage,
        'module' => $module,
    ]);
}


    public function allAssessments(){
        $quizzes = Quiz::with('module.course') // Adjust the relationship as per your models
        ->withCount('questions')
        ->paginate(10); // Adjust pagination as needed

    return view('admin.all-assessment', compact('quizzes'));
    }


    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        if($quiz->delete()){
        return redirect()->route('all.assessement')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Assessment deleted successfully!',
            'icon' => 'success'
        ]);

        }
    }
}
