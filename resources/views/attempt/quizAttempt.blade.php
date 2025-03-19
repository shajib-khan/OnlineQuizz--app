@extends('master')

@section('content')
<div class="container">
    <h2>Attempt Quiz: {{ $quiz->title }}</h2>

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
        @csrf
        @foreach($questions as $question)
            <div class="mb-3">
                <p><strong>{{ $question->question_text }}</strong></p>
                <input type="text" name="question_id{{ $question->id }}" class="form-control" required>
            </div>
        @endforeach
        <button type="submit" class="btn btn-success">Submit Quiz</button>
    </form>
</div>
@endsection
