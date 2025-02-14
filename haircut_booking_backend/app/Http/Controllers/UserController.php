<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Ensure you import the Role model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // Display a listing of the users
    public function index(Request $request)
    {
        // Get the search query and role from the request
        $search = $request->input('search');
        $role = $request->input('role');


        // Start a query on the User model
        $query = User::query();

        // Filter by role if a role is selected
        if ($role) {
            $query->where('role_id', $role);
        }

        // Search users by name or email if a search query exists
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // Sort the users based on selected criteria
        $query->orderBy('created_at', 'desc');

        // Paginate the results (10 users per page)
        $users = $query->paginate(10);


        // Calculate statistics dynamically
        $totalUsers = User::count();
        $roles = Role::all()->keyBy('id'); // Fetch all roles at once

        $roleStatistics = [];

        foreach ($roles as $role) {
            // Count users for each role based on role_id
            $roleStatistics[$role->role_name] = User::where('role_id', $role->id)->count();
        }

        return view('users.index', compact('users', 'totalUsers', 'roleStatistics', 'roles'));
    }

    // Show the form for creating a new user
    public function create()
    {
        // Fetch all roles from the database to pass to the view
        $roles = Role::all();
        return view('users.create', compact('roles')); // Return a view with create user form
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id', // Update this line
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing the password
            'role_id' => $request->role_id, // Use role_id instead
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show the details of the specified user
    public function show(User $user)
    {
        return view('users.show', compact('user')); // Return a view with user details
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        $roles = Role::all(); // Fetch roles
        return view('users.edit', compact('user', 'roles')); // Return a view with edit user form
    }

    // Update the specified user in storage
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Unique except current user
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id', // Update this line
        ]);

        // Update user data
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password); // Hash password if updated
        }
        $user->role_id = $request->role_id; // Use role_id instead
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // for user status update
    public function updateStatus(Request $request, User $user)
    {
        // Toggle the status: if active (1), set to inactive (2), and vice versa
        $user->status_id = $user->status_id === 1 ? 2 : 1; // 1 for active, 2 for inactive
        $user->save();

        return redirect()->route('users.index')->with('success', 'User status updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
