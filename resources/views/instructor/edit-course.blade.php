@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Course</h1>
        <form method="POST" action="{{ route('instructor.courses.update', $course->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}">
            </div>
            <!-- Add more input fields for other course details if needed -->
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
@endsection
