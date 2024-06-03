@extends('layouts.app')

@section('content')
    <h1>Enrolled Students for {{ $course->name }}</h1>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrolledStudents as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <form action="{{ route('grades.submit', $course->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="number" name="grade" min="0" max="100" step="0.01" required>
                        <button type="submit">Submit Grade</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
