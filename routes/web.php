<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/validation',[ValidationController::class, 'validation']);

// =============================
// ADMIN
// =============================

Route::get('/admin/dashboard',[DashboardController::class,'view'])->middleware(['auth','verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    // Admin Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User
    Route::get('/admin/users',[AdminUserController::class,'list'])->name('admin.users');
    Route::post('/admin/users/store',[AdminUserController::class,'store'])->name('admin.users.store');
});

require __DIR__.'/auth.php';
