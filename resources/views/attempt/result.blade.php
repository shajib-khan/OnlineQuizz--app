@extends('master')

@section('content')
<div class="container">
    <h2>Quiz Result: {{ $quiz->title }}</h2>

    @if($attempt)
        <p><strong>Score:</strong> {{ $attempt->score }}%</p>
    @else
        <p>No attempt found.</p>
    @endif

    <a href="{{ route('quizzes.index') }}" class="btn btn-primary">Back to Quizzes</a>
</div>
@endsection
