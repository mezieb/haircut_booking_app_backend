<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB; // Import DB facade for executing queries

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set default status_id for all existing users
        DB::table('users')->update(['status_id' => 1]); // Assuming '1' corresponds to "Active"
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optional: revert status_id back to null if needed
        DB::table('users')->update(['status_id' => null]); // Or set a different default as needed
    }
};
