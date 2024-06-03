@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add User to Faculty</h1>

        <!-- Display form to add user to faculty -->
        <form action="{{ route('admin.faculty.addUser', ['id' => $faculty->id]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Select User</label>
                <select class="form-select" id="user_id" name="user_id">
                    <!-- Populate options with users -->
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="faculty_id" class="form-label">Select Faculty</label>
                <select class="form-select" id="faculty_id" name="faculty_id">
                    <!-- Populate options with faculties -->
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add User to Faculty</button>
        </form>
    </div>
@endsection
