<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
        <i class="fas fa-users text-blue-500 text-2xl mr-3"></i>
        <div>
            <h2 class="text-xl font-bold">Total Users</h2>
            <p class="text-lg">{{ $totalUsers }}</p>
        </div>
    </div>

    @php
    // Optional: Define icons for roles.
    $icons = [
        'Client' => 'fas fa-user',
        'Barber' => 'fas fa-user-circle',
        'Staff' => 'fas fa-users-cog',
        'Admin' => 'fas fa-user-shield',
        'Manager' => 'fas fa-user-tie',
        'Receptionist' => 'fas fa-phone-alt',
        'Stylist' => 'fas fa-scissors',
        'Spa Technician' => 'fas fa-spa',
        'Law Consultant' => 'fas fa-gavel',
        'Accountant' => 'fas fa-calculator',
    ];
    @endphp

    @foreach ($roleStatistics as $roleName => $count)
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
        <i class="{{ $icons[$roleName] ?? 'fas fa-user' }} text-green-500 text-2xl mr-3"></i> <!-- Use a default icon -->
        <div>
            <h2 class="text-xl font-bold">{{ $roleName }}</h2>
            <p class="text-lg">{{ $count }}</p>
        </div>
    </div>
    @endforeach
</div>