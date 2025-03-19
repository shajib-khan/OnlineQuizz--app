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
        Question::create([
            'question_text' => $request->question_text,
            'quiz_id' => $quiz->id, // Ensure quiz_id is set
        ]);

        return redirect()->route('quizzes.index')->with('success','question created');

    }
    public function show(Quiz $quiz)
    {
        $questions = Question::where('quiz_id', $quiz->id)->paginate(10); // Fetch paginated questions
        return view('question.listQuestion', compact('quiz', 'questions'));
    }

     //edit quiz
     public function edit(Question $question)
     {
        return view('question.edit',compact('question'));
     }

     public function update(Request $request, Question $question)
     {
        $request->validate([
            'question_text'=>'required',
        ]);
        $question->update([
            'question_text'=>$request->question_text,

        ]);
        return redirect()->route('list.question', $question->quiz_id)->with('success', 'Question update successfully!');
     }
     public function delete(Question $question)
     {
        $question->delete();
        return redirect()->route('list.question', $question->quiz_id)->with('success', 'Question deleted successfully!');
}


}
