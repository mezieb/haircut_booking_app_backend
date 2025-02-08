@extends('layouts.app') <!-- Use your base layout -->

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-6">
    <div class="w-full max-w-md">
        <h1 class="text-2xl font-semibold text-center mb-4">Add New User</h1>

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
        <!-- End of form validation -->

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="client">Client</option>
                    <option value="barber">Barber</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">
                Create User
            </button>
        </form>
    </div>
</div>
@endsection