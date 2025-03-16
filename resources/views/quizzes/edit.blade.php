@extends('master')

@section('content')
<div class="container">
    <h2>Edit Quiz</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('update.quiz',$quiz->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Quiz Title</label>
            <input type="text" name="title" value="{{ $quiz->title }}" class="form-control" >
        </div>

        <button type="submit" class="btn btn-success mt-2">Edit Quiz</button>

    </form>
</div>
@endsection
