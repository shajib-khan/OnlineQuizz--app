<?php
namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        Quiz::create([
            'title' => $request->title,
        ]);


        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully!');
    }

    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index',compact('quizzes'));
    }

//edit quiz
    public function edit(Quiz $quiz)
    {

        return view('quizzes.edit',compact('quiz'));
    }
    public function update(Request $request,Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
     $quiz->update([
        'title'=> $request->title,
     ]);
     return redirect()->route('quizzes.index')->with('update', "Quiz Successfully Updated");
    }


    public function deleteQuiz( Quiz $quiz)

    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('delete', "Quiz Successfully Deleted");
    }


}
