<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;

class AdminFacultyController extends Controller
{
    /**
     * Display a listing of the faculty.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all faculty members from the database
        $faculties = Faculty::all();
        
        // Return a view with the faculty data
        return view('admin.faculty.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new faculty member.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new faculty member
        return view('admin.faculty.create');
    }

    /**
     * Store a newly created faculty member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new faculty member with the provided data
        $faculty = Faculty::create([
            'name' => $request->name,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('admin.faculty.index')->with('success', 'Faculty member created successfully.');
    }

    // Add more methods for updating, deleting, etc., as needed
}

