@extends('master')

@section('content')
<div class="container mt-2">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Quiz Title --}}
    <h3>Questions for: <strong>{{ $quiz->title }}</strong></h3>

    {{-- Back to Quiz List Button --}}
    <a href="{{ route('quizzes.index') }}" class="btn btn-warning btn-sm mb-2">All Quizzes</a>

    {{-- Questions Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Question Text</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->question_text }}</td>
                    <td>
                        <a href="{{ route('edit.question', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('delete.question', $question->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No questions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $questions->links() }}
    </div>

</div>
@endsection
