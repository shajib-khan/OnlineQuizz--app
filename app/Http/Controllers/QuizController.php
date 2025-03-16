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


        return redirect()->route('quizzes.create')->with('success', 'Quiz created successfully!');
    }

    public function index()
    {
        $quizzes = Quiz::all();
        return view('quizzes.index',compact('quizzes'));
    }


}
