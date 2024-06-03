@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Enrollment and Registration</h2>
            <p>Enrolled Courses:</p>
            <ul>
                @foreach(Auth::user()->courses as $course)
                <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <h2>Grades and Performance</h2>
            <p>Grades:</p>
            <ul>
                @foreach(Auth::user()->grades as $grade)
                <li>{{ $grade->course->name }} - {{ $grade->grade }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Additional sections -->
    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Attendance</h2>
            <p>View your attendance records here.</p>
            <a href="{{ route('student.attendance') }}" class="btn btn-primary">View Attendance</a>
        </div>

        <div class="col-md-6">
            <h2>Course Materials</h2>
            <p>Access course materials and resources.</p>
            <a href="{{ route('student.course_materials') }}" class="btn btn-primary">Access Course Materials</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Financials</h2>
            <p>View financial information such as fee payments, invoices, etc.</p>
            <a href="{{ route('student.financials') }}" class="btn btn-primary">View Financials</a>
        </div>

        <div class="col-md-6">
            <h2>Available Courses</h2>
            <p>Check available courses and enroll in new courses.</p>
            <a href="{{ route('students.available_courses') }}" class="btn btn-success">Check Available Courses</a>
        </div>
    </div>
</div>
    <!-- Button to check available courses -->
   @endsection
