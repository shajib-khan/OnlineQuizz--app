@extends('master')

@section('content')
<div class="container">
    <h2>Quizzes List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('delete'))
    <div class="alert alert-success">{{ session('delete') }}</div>
    @endif
    @if(session('update'))
    <div class="alert alert-success">{{ session('update') }}</div>
    @endif
    <table class="table table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($quizzes as $quiz)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $quiz->title }}</td>
                    <td>{{ $quiz->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                     <a href="{{ route('list.question', $quiz->id) }}" class="btn btn-info btn-sm">Show Question</a>
                     <a href="{{ route('create.question', $quiz->id) }}" class="btn btn-info btn-sm">Create Question</a>
                        <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-warning btn-sm">Delete</a>
                        <a href="{{ route('quiz.attempt', $quiz->id) }}" class="btn btn-warning btn-sm">attempt </a>


                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No quizzes found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('quizzes.create') }}" class="btn btn-success">Create New Quiz</a>
</div>
@endsection
