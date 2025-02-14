<?php

namespace App\Http\Controllers;


use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    // Display a list of roles
    public function index()
    {
        $roles = Role::all(); // Fetch all roles
        return view('roles.index', compact('roles')); // Return the roles list view
    }

    // Display the role creation form
    public function create()
    {
        return view('roles.create');
    }

    // Store the newly created role
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles'
        ]);

        Role::create($request->only('role_name'));

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // Show the edit form with current role
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    // Update the existing role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name,' . $role->id // Ensure the updated name is unique
        ]);

        $role->update($request->only('role_name'));

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    // Delete the existing role
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
