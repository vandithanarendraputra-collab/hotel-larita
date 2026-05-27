<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/* Public Pages */
Route::get('/', function () {
    return view('home');
})->name('home');

/* Authentication Routes */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* Protected Routes */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $reservations = \Illuminate\Support\Facades\Auth::user()->reservations()->latest()->get();
        return view('dashboard', compact('reservations'));
    })->name('dashboard');

    Route::post('/reservations', [AuthController::class, 'storeReservation'])->name('reservations.store');
});

/* Helper Route for Remote Migrations (Temporary helper) */
Route::get('/run-migration', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return "Database migration successfully run! All tables are set up.";
    } catch (\Exception $e) {
        return "Error running migration: " . $e->getMessage();
    }
});


