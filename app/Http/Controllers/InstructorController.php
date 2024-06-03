<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function dashboard()
    {
        $courses = Course::all();
        return view('instructor.dashboard', compact('courses'));
    }
 public function courses()
    {
        $courses = Course::all();
        return view('instructor.courses', compact('courses'));
    }
    public function update(Request $request, $id)
{
    // Find the course by its ID
    $course = Course::findOrFail($id);
    
    // Update the course details
    $course->title = $request->title;
    // Add more fields to update if needed
    
    // Save the changes
    $course->save();

    // Redirect back with success message
    return redirect()->route('instructor.courses')->with('success', 'Course updated successfully.');
}

     public function create()
    {
        return view('instructor.create-course');
    }
   public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'title' => 'required',
        // Add more validation rules as needed
    ]);

    // Create a new course with the authenticated user's ID
    $course = new Course();
    $course->title = $request->title;
    $course->user_id = Auth::id(); // Set the user_id to the ID of the authenticated user
    // Add more fields as needed
    $course->save();

    // Redirect back with success message
    return redirect()->route('instructor.courses')->with('success', 'Course created successfully.');
}
    public function attendance($id)
    {
        $course = Course::findOrFail($id);
        return view('instructor.attendance', compact('course'));
    }
    public function edit($id)
{
    $course = Course::findOrFail($id);
    return view('instructor.edit-course', compact('course'));
}
public function grades()
{
    
}
public function showEnrolledStudents($courseId)
    {
        // Get the course
        $course = Course::findOrFail($courseId);
        
        // Get the enrolled students for the course
        $enrolledStudents = $course->students;

        return view('instructor.enrolled_students', compact('course', 'enrolledStudents'));
    }

    public function submitGrades(Request $request, $courseId)
    {
        // Logic to handle form submission and save grades
    }
    

    public function materials($id)
    {
        $course = Course::findOrFail($id);
        $materials = $course->materials;
        return view('instructor.materials', compact('course', 'materials'));
    }

    public function createMaterial($id)
    {
        $course = Course::findOrFail($id);
        return view('instructor.create-material', compact('course'));
    }

    public function storeMaterial(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // Add more validation rules as needed
        ]);

        // Create a new material for the course
        $course->materials()->create([
            'title' => $request->title,
            'description' => $request->description,
            // Add more fields as needed
        ]);

        // Redirect back with success message
        return redirect()->route('instructor.materials', $course->id)->with('success', 'Material created successfully.');
    }
}
