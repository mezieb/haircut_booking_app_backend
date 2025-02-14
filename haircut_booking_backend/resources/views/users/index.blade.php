@extends('layouts.app') <!-- Use your base layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">User Management</h1>
    
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 inline-flex items-center">
        <i class="fas fa-plus mr-1"></i> Add New User
    </a>

    <!-- Display Success Flash Message -->
    @if(session('success'))
    <div class="flex justify-center mt-3">
        <div class="mb-4 bg-green-500 text-green-100 text-center p-4 rounded-lg shadow">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <!-- Include the sorting component -->
    @include('users.sorting')

    <!-- Include User Statistics Component -->
    @include('users.userstatist', [
    'totalUsers' => $totalUsers,
    'roleStatistics' => $roleStatistics // Pass the dynamic role statistics
])
<!-- end of Include User Statistics Component -->
    <!-- Unified search and filter functionality -->
    <div class="mt-4 mb-4">
        <form action="{{ route('users.index') }}" method="GET" class="relative flex items-center">
            <input type="text" name="search" placeholder="Search by name or email"
                    class="border border-gray-300 rounded-md pl-10 p-2 w-full lg:w-1/3">
            <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i> <!-- Search Icon -->

            <select name="role" class="ml-2 border border-gray-300 rounded-md p-2">
                <option value="">All Roles</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ request('role') == $role->id ? 'selected' : '' }}>
                    {{ $role->role_name }}
                </option>
            @endforeach
            </select>

            <button type="submit" id="searchBtn" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 ml-2 relative">
                <span class="search-text">Search</span>
                <span class="loading-text hidden absolute left-1/2 transform -translate-x-1/2">Searching...</span>
            </button>
        </form>

        <!-- Button to go back to all users -->
        @if(request('search') || request('role')) <!-- Check if there is a search query or role -->
        <a href="{{ route('users.index') }}" class="mt-2 inline-block text-blue-500 hover:text-blue-600">
            &larr; Back to All Users
        </a>
        @endif
    </div>
    
    <!-- User List Table -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border-collapse border border-gray-300 table-fixed">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-400 p-2">Name</th>
                    <th class="border border-gray-400 p-2">Email</th>
                    <th class="border border-gray-400 p-2">Role</th>
                    <th class="border border-gray-400 p-2">Creation Date</th>
                    <th class="border border-gray-400 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
        <tr>
            <td colspan="5" class="border border-gray-400 p-2 text-center text-gray-500">
                No users found for your search: "{{ request('search') }}".
            </td>
        </tr>
    @else
        @foreach ($users as $user)
        <tr class="bg-white hover:bg-gray-100">
            <td class="border border-gray-400 p-2">{{ $user->name }}</td>
            <td class="border border-gray-400 p-2">{{ $user->email }}</td>
            <td class="border border-gray-400 p-2">{{ $user->role->role_name ?? 'No Role Assigned' }}</td>
            <td class="border border-gray-400 p-2">{{ $user->created_at->format('m/d/Y') }}</td>
            <td class="border border-gray-400 p-2">
                @include('users.userstatus', ['user' => $user]) <!-- Include User Status Component -->
                <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-800 inline-flex items-center">
                    <i class="fas fa-edit mr-1"></i> Edit
                </a>
                |
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button text-red-600 hover:text-red-800 inline-flex items-center">
                        <i class="fas fa-trash-alt mr-1"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    @endif
        </tbody>
        </table>
    </div>

    <!-- Confirmation Modal -->
<div id="deleteConfirmationModal" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
    <div class="bg-white shadow-lg rounded-md p-4 w-1/3 mx-auto">
        <h2 class="text-lg font-bold mb-2">Confirm Deletion</h2>
        <p>Are you sure you want to delete this user?</p>
        <div class="mt-4 flex justify-end">
            <button id="cancelDelete" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded" onclick="toggleModal(false)">
                Cancel
            </button>
            <form action="" method="POST" id="deleteForm" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">
                    OK, Delete
                </button>
            </form>
        </div>
    </div>
</div>
<!--end of the Confirmation Modal -->
    <!-- Include the pagination component -->
@include('users.pagination', ['users' => $users])
</div>
@endsection