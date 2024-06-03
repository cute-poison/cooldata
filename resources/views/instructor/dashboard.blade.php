@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, Instructor</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Course Management</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('instructor.courses') }}" class="btn btn-primary btn-block">Manage Courses</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('instructor.create-course') }}" class="btn btn-primary btn-block">Create Course</a>
                            </li>
                            <!-- Add more course-related links as needed -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Course Activities</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <!-- Assuming you have a list of courses to choose from -->
                            @foreach($courses as $course)
                                <li class="list-group-item">
                                    <strong>{{ $course->title }}</strong>
                                    <ul>
                                        <li>
                                            <a href="{{ route('instructor.attendance', ['id' => $course->id]) }}" class="btn btn-primary btn-sm">Attendance Tracking</a>
                                        </li><br>
                                        <li>
                                            <a href="{{ route('instructor.enrolled_students', ['id' => $course->id]) }}" class="btn btn-primary btn-sm">Grade Students</a>
                                        </li>
                                        <!-- Add more course activity links as needed -->
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Allocated Resources</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <!-- Display links to view allocated resources -->
                            <li class="list-group-item">
                                <a href="{{ route('instructor.resources') }}" class="btn btn-primary btn-block">View Allocated Resources</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
