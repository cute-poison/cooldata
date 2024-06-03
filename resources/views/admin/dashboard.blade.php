@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('img/bck_img10.jpg') }}'); /* Reference to the background image */
        background-size: cover;
        background-position: cover;
        background-repeat: no-repeat;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.8); /* Adding a semi-transparent white background to the card */
        /* You can adjust the opacity value (0.8) to your preference */
    }
</style>
<div class="container">
    <h1>Welcome, Admin</h1>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Management</h5>
                    <p class="card-text">Manage users, including students, instructors, and other staff.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Course Management</h5>
                    <p class="card-text">Manage courses and curriculum.</p>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">Manage Courses</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Faculty Management</h5>
                    <p class="card-text">schedule classes and mange faculty.</p>
                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-primary">Manage Faculty</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Finance and Billing</h5>
                    <p class="card-text">Manage fees, invoicing, payments, and financial reporting.</p>
                    <a href="{{ route('admin.finance.index') }}" class="btn btn-primary">Manage Finance</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resource Management</h5>
                    <p class="card-text">Allocate classrooms, book equipment, and manage inventory.</p>
                    <a href="{{ route('admin.resources.index') }}" class="btn btn-primary">Manage Resources</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
