@extends('master')

@section('content')
<div class="container">
    <h2>Quizzes List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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
                        {{-- <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form> --}}
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
