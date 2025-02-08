<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// User Management Routes
Route::resource('users', UserController::class);
Route::patch('users/{user}/status', [UserController::class, 'updateStatus'])->name('users.status');
