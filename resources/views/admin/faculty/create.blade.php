@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Faculty Management</h1>

        <!-- Display a form to create new faculty -->
        <form action="{{ route('faculty.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Faculty Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Create Faculty</button>
        </form>
    </div>
@endsection
