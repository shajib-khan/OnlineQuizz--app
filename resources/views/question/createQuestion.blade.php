@extends('master')

@section('content')
@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>Create New Question for Quiz: {{ $quiz->title }}</h2>

    <form action="{{ route('questions.store', $quiz->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question_text">Question Text</label>
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <textarea name="question_text" id="question_text" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Create Question</button>
    </form>

@endsection
