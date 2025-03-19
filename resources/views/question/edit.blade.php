@extends('master')

@section('content')
    <div class="container">
        <h2>Edit Question</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('update.question', $question->id) }}" method="POST">
            @csrf
           

            <div class="form-group">
                <label for="question_text">Question Text</label>
                <textarea name="question_text" id="question_text" class="form-control" rows="3" required>{{ $question->question_text }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-2">Update Question</button>
        </form>
    </div>
@endsection
