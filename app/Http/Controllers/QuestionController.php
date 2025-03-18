<?php

namespace App\Http\Controllers;


use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        return view('question.createQuestion',compact('quiz'));
    }
    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
        'question_text'=>'required',
        ]);
        $quiz->questions()->create([
            'question_text' => $request->question_text,
            'quiz_id' => $quiz->id, // Ensure quiz_id is set
        ]);
        return redirect()->route('list.question')->with('success', 'Queston Created!');
    }
    public function show()
    {
        $questions = Question::all();
        return view('question.listQuestion',compact('questions'));

    }

}
