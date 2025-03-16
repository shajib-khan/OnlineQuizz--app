@extends('master')

@section('content')
<div class="container">
    <h2>Create a New Quiz</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('quizzes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Quiz Title</label>
            <input type="text" name="title" class="form-control" >
        </div>

        <button type="submit" class="btn btn-success mt-2">Create Quiz</button>
        
    </form>
</div>
@endsection
