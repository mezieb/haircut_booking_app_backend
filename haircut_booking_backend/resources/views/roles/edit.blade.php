@extends('layouts.app') <!-- Use your base layout -->

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-6">
    <div class="w-full max-w-md">
        <h1 class="text-2xl font-semibold text-center mb-4">Edit Role</h1>

        <!-- Form validation -->
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Specify the HTTP method for update -->

            <div class="mb-4">
                <label for="role_name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" id="role_name" name="role_name" required
                    value="{{ old('role_name', $role->role_name) }}" 
                    aria-label="Role name input" 
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md" 
                    placeholder="Enter role name">
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">
                <i class="fas fa-edit mr-1"></i> Update Role
            </button>
        </form>

        <!-- Back to Role List Button -->
        <div class="mt-4 text-center">
            <a href="{{ route('roles.index') }}" class="text-blue-500 hover:text-blue-600">
                &larr; Back to Roles List
            </a>
        </div>
    </div>
</div>
@endsection