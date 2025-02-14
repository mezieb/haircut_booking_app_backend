@extends('layouts.app') <!-- Use your base layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Role Management</h1>

    <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 inline-flex items-center mb-4">
        <i class="fas fa-plus mr-1"></i> Add New Role
    </a>

    <!-- Display Success Message -->
    @if(session('success'))
    <div class="flex justify-center mt-3">
        <div class="mb-4 bg-green-500 text-green-100 text-center p-4 rounded-lg shadow">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <!-- Roles List Table -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border-collapse border border-gray-300 table-fixed">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-400 p-2">Role Name</th>
                    <th class="border border-gray-400 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($roles->isEmpty())
                    <tr>
                        <td colspan="2" class="border border-gray-400 p-2 text-center text-gray-500">
                            No roles available.
                        </td>
                    </tr>
                @else
                    @foreach ($roles as $role)
                    <tr class="bg-white hover:bg-gray-100">
                        <td class="border border-gray-400 p-2">{{ $role->role_name }}</td>
                        <td class="border border-gray-400 p-2">
                            <a href="{{ route('roles.edit', $role->id) }}" class="text-yellow-600 hover:text-yellow-800 inline-flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            |
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center">
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
</div>
@endsection