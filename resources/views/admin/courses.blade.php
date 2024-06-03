@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Courses</h1>
        <ul class="list-group">
            @foreach($courses as $course)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $course->title }}</strong> - Instructor: {{ $course->user->name }}
                    </div>
                    <div>
                        <span class="badge badge-primary">{{ $course->students()->count() }}</span> Students Enrolled
                        <div class="btn-group" role="group" aria-label="Actions">
                            <a href="{{ route('instructor.edit-course', $course->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Add more buttons for other actions if needed -->
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
