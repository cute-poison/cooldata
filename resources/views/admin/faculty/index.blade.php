@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Faculty Management</h1>

        <!-- Display success message if exists -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Display a button to create a new faculty -->
        <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary mb-3">Create Faculty</a>

        <!-- Display a table of faculties -->
        @if ($faculties->isEmpty())
            <p>No faculties found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faculties as $faculty)
                        <tr>
                            <td>{{ $faculty->name }}</td>
                            <td>
                                <form action="{{ route('admin.faculty.destroy', $faculty->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
