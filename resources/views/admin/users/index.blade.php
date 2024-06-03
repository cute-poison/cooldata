@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Users</h1>
         <div class="mb-3">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Create User</a>
        </div>


        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                               <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-primary">View User</a>
                                <a href="{{ route('admin.users.update', $user->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('admin.users.show', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
