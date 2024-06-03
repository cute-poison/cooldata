@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Course</h1>
        <!-- Add your form elements here -->
        <form method="POST" action="{{ route('instructor.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
@endsection
