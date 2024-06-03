@extends('layouts.admin')

@section('content')
    <h1>Add New Resource</h1>
    <form action="{{ route('resources.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Resource Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="text" name="url" id="url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Resource</button>
    </form>
@endsection
