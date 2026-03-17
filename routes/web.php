<?php

use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminRoleController;
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
    Route::get('/admin/users/filter',[AdminUserController::class,'list_filter']);
    Route::post('/admin/users/store',[AdminUserController::class,'store'])->name('admin.users.store');
    Route::get('/admin/users/destroy/{user}',[AdminUserController::class,'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/edit',[AdminUserController::class,'edit'])->name('admin.users.edit');
    Route::post('/admin/users/update',[AdminUserController::class,'update'])->name('admin.users.update');
    Route::post('/admin/users/updateStatus',[AdminUserController::class,'updateStatus']);
    Route::post('/admin/users/action',[AdminUserController::class,'action'])->name('admin.users.action');

    // Permission
    Route::get('/admin/permissions',[AdminPermissionController::class,'view'])->name('admin.permissions');
    
    // Role
    Route::get('/admin/roles',[AdminRoleController::class,'view'])->name('admin.roles');

    

});

require __DIR__.'/auth.php';
