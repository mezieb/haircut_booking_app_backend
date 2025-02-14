<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// User Management Routes
Route::resource('users', UserController::class);
Route::patch('users/{user}/status', [UserController::class, 'updateStatus'])->name('users.status');

// Role Management Routes
Route::resource('roles', RolesController::class);
