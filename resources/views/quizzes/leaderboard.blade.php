@extends('master')

@section('content')
<div class="container">
    <h2>Leaderboard</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rank</th>
                <th>User</th>
                <th>Quiz</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaderboard as $index => $attempt)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $attempt->user->name }}</td>
                    <td>{{ $attempt->quiz->title }}</td>
                    <td>{{ $attempt->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
