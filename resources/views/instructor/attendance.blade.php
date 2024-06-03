@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Attendance Tracking - {{ $course->title }}</h1>
        <form action="{{ route('instructor.submitAttendance', ['id' => $course->id]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course->students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>
                                        <input type="checkbox" name="attendance[{{ $student->id }}]" value="present"> Present
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit Attendance</button>
                </div>
            </div>
        </form>
    </div>
@endsection
