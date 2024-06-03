<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('students.dashboard');
    }

    public function attendance()
    {
        // Logic to retrieve and display attendance records
        return view('students.attendance');
    }

    public function courseMaterials()
    {
        // Logic to retrieve and display course materials
        return view('students.course_materials');
    }

    public function financials()
    {
        // Logic to retrieve and display financial information
        return view('students.financials');
    }

    public function otherSections()
    {
        // Logic to handle other sections of the dashboard
        return view('students.other_sections');
    }

    public function showAvailableCourses()
    {
        // Fetch all courses
        $courses = Course::all();

        // Pass the courses to the view
        return view('students.available_courses', compact('courses'));
    }
     public function show($id)
    {  $courses = Course::all();

        // Pass the courses to the view
        return view('students.available_courses', compact('courses'));
    
        
            }

    public function enrollCourse(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        auth()->user()->courses()->attach($course);
        return redirect()->route('students.dashboard')->with('success', 'You have successfully enrolled in the course.');
    }
}
