<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminFacultyController;
use App\Http\Controllers\Admin\AdminFinanceController;
use App\Http\Controllers\Admin\AdminResourceController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

// Resource routes
Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('faculties', FacultyController::class);
Route::resource('finances', FinanceController::class);
Route::resource('resources', ResourceController::class);

// Routes for user management
Route::get('/admin/users/index', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/{id}/show', [AdminUserController::class, 'show'])->name('admin.users.show');
Route::get('/admin/users/{id}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}/show', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [AdminUserController::class, 'store'])->name('users.store');

// Add more routes for user management as needed

// Routes for course management
Route::get('/admin/courses/index', [AdminCourseController::class, 'index'])->name('admin.courses.index');
Route::get('/admin/courses/create', [AdminCourseController::class, 'create'])->name('admin.courses.create');
// Add more routes for course management as needed

// Routes for faculty management
Route::get('/admin/faculty/index', [AdminFacultyController::class, 'index'])->name('admin.faculty.index');
Route::get('/admin/faculty/create', [AdminFacultyController::class, 'create'])->name('admin.faculty.create');
Route::post('/admin/faculty/store', [AdminFacultyController::class, 'store'])->name('faculty.store');
Route::delete('/admin/faculty/{id}', [AdminFacultyController::class, 'destroy'])->name('admin.faculty.destroy');
Route::get('/admin/faculty/{id}/edit', [AdminFacultyController::class, 'edit'])->name('admin.faculty.edit');

// Add more routes for faculty management as needed

// Routes for finance management
Route::get('/admin/finance/index', [AdminFinanceController::class, 'index'])->name('admin.finance.index');
Route::get('/admin/finance/create', [AdminFinanceController::class, 'create'])->name('admin.finance.create');
// Add more routes for finance management as needed

// Routes for resource management
Route::get('/admin/resources/index', [AdminResourceController::class, 'index'])->name('admin.resources.index');
Route::get('/admin/resources/create', [AdminResourceController::class, 'create'])->name('admin.resources.create');
// Add more routes for resource management as needed

Route::get('/student/attendance', [StudentController::class, 'attendance'])->name('student.attendance');
Route::get('/student/course-materials', [StudentController::class, 'courseMaterials'])->name('student.course_materials');
Route::get('/student/financials', [StudentController::class, 'financials'])->name('student.financials');
Route::get('/student/other-sections', [StudentController::class, 'otherSections'])->name('student.other_sections');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Instructor Dashboard
Route::middleware(['auth', 'instructor'])->group(function () {
    Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
    Route::post('/instructor/attendance/{id}', [InstructorController::class, 'submitAttendance'])->name('instructor.submitAttendance');
    Route::get('/instructor/courses', [InstructorController::class, 'courses'])->name('instructor.courses');
    Route::post('/instructor/courses/store', [InstructorController::class, 'store'])->name('instructor.store');
    Route::get('/instructor/create-course', [InstructorController::class, 'create'])->name('instructor.create-course');
    Route::post('/instructor/courses/store', [InstructorController::class, 'store'])->name('instructor.store');
    Route::get('/instructor/{course}/edit-course', [InstructorController::class, 'edit'])->name('instructor.edit-course');
    Route::get('/instructor/{id}/edit-course', [InstructorController::class, 'edit'])->name('instructor.edit-course');
    Route::put('/instructor/{id}/update', [InstructorController::class, 'update'])->name('instructor.update');
    Route::delete('/instructor/{id}/destroy', [InstructorController::class, 'destroy'])->name('instructor.destroy');
    Route::get('/instructor/{id}/attendance', [InstructorController::class, 'attendance'])->name('instructor.attendance');
    Route::get('/instructor/{id}/materials', [InstructorController::class, 'materials'])->name('instructor.materials');
    Route::get('/instructor/{id}/materials/create', [InstructorController::class, 'createMaterial'])->name('instructor.materials.create');
    Route::post('/instructor/{id}/materials/store', [InstructorController::class, 'storeMaterial'])->name('instructor.materials.store');
    Route::get('/instructor/resources', [InstructorController::class, 'resources'])->name('instructor.resources');
    Route::put('/instructor/courses/{id}/update', [InstructorController::class, 'update'])->name('instructor.courses.update');
    Route::get('/instructor/grades/{id}', [InstructorController::class, 'grades'])->name('instructor.grades');
    // Define routes in web.php or api.php
    Route::get('/courses/{course}/students', 'InstructorController@showEnrolledStudents')->name('students.enrolled');
    Route::post('/courses/{course}/grades', 'InstructorController@submitGrades')->name('grades.submit');
    Route::get('/instructor/enrolled_students/{id}', 'App\Http\Controllers\InstructorController@showEnrolledStudents')->name('instructor.enrolled_students');
});

// Student Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/students/available_courses', [StudentController::class, 'showAvailableCourses'])->name('students.available_courses');
    Route::post('/student/enroll/{course}', [StudentController::class, 'enrollCourse'])->name('students.enroll');
    Route::post('/student/enroll/{courseId}', [StudentController::class, 'enrollCourse'])->name('student.enroll');

});

