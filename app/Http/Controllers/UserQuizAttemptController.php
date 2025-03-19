<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\UserQuizAttempt;
use Illuminate\Support\Facades\Auth;

class UserQuizAttemptController extends Controller
{
    public function start(Quiz $quiz)
    {
        $questions = $quiz->questions()->inRandomOrder()->get();
        return view('attempt.quizAttempt', compact('quiz', 'questions'));
    }
    public function submit(Request $request, Quiz $quiz)
    {
        $user = Auth::user();
        $score = 0;
        $correctAnswers = 0;

        foreach ($quiz->questions as $question) {
            $userAnswer = $request->input("question_id{$question->id}");
            if ($userAnswer == $question->correct_answer) {
                $correctAnswers++;
            }
        }

        $score = ($correctAnswers / $quiz->questions()->count()) * 100;

        UserQuizAttempt::create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'score' => $score
        ]);

        return redirect()->route('quiz.result', $quiz->id)
                         ->with('success', 'Quiz submitted successfully!');
    }
    public function result(Quiz $quiz)
    {
        $attempt = UserQuizAttempt::where('user_id', Auth::id())->where('quiz_id', $quiz->id)->latest()->first();
        return view('attempt.result', compact('quiz', 'attempt'));
    }
    //leaderboard
    public function leaderboard()
{
    $leaderboard = UserQuizAttempt::with('user', 'quiz')
        ->orderByDesc('score') // Order by highest score first
        ->take(10) // Get the top 10 users
        ->get();

    return view('quizzes.leaderboard', compact('leaderboard'));
}
}
