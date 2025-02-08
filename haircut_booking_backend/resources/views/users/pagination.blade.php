@if ($users->hasPages())
    <div class="mt-4">
        <nav class="flex justify-center space-x-4">
            {{-- Previous Page Link --}}
            @if ($users->onFirstPage())
                <span class="disabled cursor-not-allowed opacity-50">
                    <i class="fas fa-chevron-left"></i> Previous
                </span>
            @else
                <a href="{{ $users->previousPageUrl() }}" class="text-blue-500 hover:text-blue-600">
                    <i class="fas fa-chevron-left"></i> Previous
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}" class="text-blue-500 hover:text-blue-600">
                    Next <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="disabled cursor-not-allowed opacity-50">
                    Next <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </nav>
    </div>
@endif