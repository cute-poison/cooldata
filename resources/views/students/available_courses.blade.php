<!-- students/available_courses.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Courses</h1>

        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5> <!-- Change $course->name to $course->title -->
                            <p class="card-text">{{ $course->description }}</p>
                            <form action="{{ route('students.enroll', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
