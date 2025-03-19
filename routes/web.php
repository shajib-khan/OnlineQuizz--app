<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserQuizAttemptController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//admin quiz create
Route::get('quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
Route::post('quizzes/store', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('quizzes', [QuizController::class, 'index'])->name('quizzes.index');

//edit quiz
Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
Route::post('/quizzes/{quiz}/update', [QuizController::class, 'update'])->name('update.quiz');
Route::get('delete/{quiz}',[QuizController::class,'deleteQuiz'])->name('quizzes.destroy');

//question
Route::get('/create-question/{quiz}',[QuestionController::class,'create'])->name('create.question');
Route::post('/store-question/{quiz}',[QuestionController::class,'store'])->name('questions.store');
Route::get('/list/question/{quiz}', [QuestionController::class, 'show'])->name('list.question');

//edit question
Route::get('edit-question/{question}',[QuestionController::class,'edit'])->name('edit.question');
Route::post('update/question/{question}',[QuestionController::class,'update'])->name('update.question');
Route::get('delete/question/{question}',[QuestionController::class,'delete'])->name('delete.question');

//user quiz attempt
Route::get('/quiz/{quiz}/attempt', [UserQuizAttemptController::class, 'start'])->name('quiz.attempt');
Route::post('/quiz/{quiz}/submit', [UserQuizAttemptController::class, 'submit'])->name('quiz.submit');
Route::post('/quiz/{quiz}/submit', [UserQuizAttemptController::class, 'submit'])->name('quiz.submit');
Route::get('/quiz/{quiz}/result', [UserQuizAttemptController::class, 'result'])->name('quiz.result');




