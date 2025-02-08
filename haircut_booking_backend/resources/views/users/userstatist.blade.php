<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
        <i class="fas fa-users text-blue-500 text-2xl mr-3"></i>
        <div>
            <h2 class="text-xl font-bold">Total Users</h2>
            <p class="text-lg">{{ $totalUsers }}</p>
        </div>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
        <i class="fas fa-user text-green-500 text-2xl mr-3"></i>
        <div>
            <h2 class="text-xl font-bold">Clients</h2>
            <p class="text-lg">{{ $totalClients }}</p>
        </div>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
        <i class="fas fa-user text-purple-500 text-2xl mr-3"></i>
        <div>
            <h2 class="text-xl font-bold">Barbers</h2>
            <p class="text-lg">{{ $totalBarbers }}</p>
        </div>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
        <i class="fas fa-users-cog text-orange-500 text-2xl mr-3"></i>
        <div>
            <h2 class="text-xl font-bold">Staff</h2>
            <p class="text-lg">{{ $totalStaff }}</p>
        </div>
    </div>
</div>