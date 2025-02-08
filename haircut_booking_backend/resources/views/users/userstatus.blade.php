<div class="flex items-center">
    @if ($user->status_id == 1)
        <span class="text-green-500 font-bold">Active</span>
    @else
        <span class="text-red-500 font-bold">Inactive</span>
    @endif
    
    <form action="{{ route('users.status', $user->id) }}" method="POST" class="inline ml-2">
        @csrf
        @method('PATCH') <!-- Assuming you're using PATCH for status update -->
        <button type="submit" class="text-blue-500 hover:text-blue-600">
            @if ($user->status_id == 1)
                <i class="fas fa-user-slash"></i> Deactivate
            @else
                <i class="fas fa-user-check"></i> Activate
            @endif
        </button>
    </form>
</div>