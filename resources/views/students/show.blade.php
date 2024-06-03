@extends('layouts.app')

@section('content')
    <h1>{{ $student->name }}</h1>
    <p>Email: {{ $student->email }}</p>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
@endsection
