<div class="flex items-center mb-4 mt-3">
    <span class="mr-2 font-medium">Sort By:</span>
    <form action="{{ route('users.index') }}" method="GET" class="flex items-center">
        <select name="sort" onchange="this.form.submit()" class="border border-gray-300 rounded-md p-2">
            <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name</option>
            <option value="email" {{ request('sort') === 'email' ? 'selected' : '' }}>Email</option>
            <option value="role" {{ request('sort') === 'role' ? 'selected' : '' }}>Role</option>
            <option value="created_at" {{ request('sort') === 'created_at' ? 'selected' : '' }}>Creation Date</option>
        </select>
        <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            <i class="fas fa-sort"></i> Sort
        </button>
    </form>
</div>