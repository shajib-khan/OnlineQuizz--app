@extends('master')

@section('content')
<div class="container">


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif



    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Question Text</th>
                <th>Quiz</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->question_text }}</td>
                    <td>{{ $question->quiz ? $question->quiz->title : 'No Quiz Found' }}</td>

                    <td>
                        {{-- <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

