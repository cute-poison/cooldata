<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return view('admin.users.update', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
   public function create()
{
    // Example: Get roles from the database and pass them to the view
    $roles = Role::all();

    // Return the view for creating new users along with the roles data
    return view('admin.users.create', compact('roles'));
}
public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|string|in:admin,instructor,student',
    ]);

    // Create a new user instance and save it to the database
    $user = new User([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']), // Hash the password
        'role' => $validatedData['role'],
    ]);
    $user->save();

    // Redirect to a success page or return a response indicating success
    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}


}
