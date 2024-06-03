<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AdminFacultyController extends Controller
{
    public function index()
    {
        // Fetch all faculties from the database
        $faculties = Faculty::all();

        // Pass the faculties data to the view
        return view('admin.faculty.index', compact('faculties'));
    }
    public function create()
    {
        // Return the view for creating a new faculty
        return view('admin.faculty.create');
    }
    public function destroy($id)
{
    // Find the faculty by ID
    $faculty = Faculty::findOrFail($id);
    
    // Delete the faculty
    $faculty->delete();
    
    // Redirect back with a success message
    return redirect()->route('admin.faculty.index')->with('success', 'Faculty deleted successfully.');
}
public function edit($id)
{
    // Retrieve the faculty record from the database
    $faculty = Faculty::findOrFail($id);

    // Return the view for editing faculty details, along with the faculty data
    return view('admin.faculty.edit', compact('faculty'));
}

public function addUser(Request $request, $facultyId)
{
    $faculty = Faculty::findOrFail($facultyId);
    $faculty->users()->attach($request->input('users'));

    return redirect()->route('admin.faculty.index')->with('success', 'Users added to faculty successfully.');
}

public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the faculty
        Faculty::create([
            'name' => $request->name,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty created successfully.');
    }
}

