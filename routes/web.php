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

    // Role
    Route::get('/admin/roles',[AdminRoleController::class,'view'])->name('admin.roles');
    Route::post('/admin/roles/store',[AdminRoleController::class,'store'])->name('admin.roles.store');
    Route::get('/admin/roles/destroy/{role}',[AdminRoleController::class,'destroy'])->name('admin.roles.destroy');
    Route::get('/admin/roles/edit',[AdminRoleController::class,'edit'])->name('admin.roles.edit');
    Route::post('/admin/roles/update',[AdminRoleController::class,'update'])->name('admin.roles.update');

    // Permission
    Route::get('/admin/permissions',[AdminPermissionController::class,'view'])->name('admin.permissions');
    Route::post('/admin/permissions/store',[AdminPermissionController::class,'store'])->name('admin.permissions.store');
    Route::get('/admin/permissions/destroy/{permission}',[AdminPermissionController::class,'destroy'])->name('admin.permissions.destroy');
    Route::get('/admin/permissions/edit',[AdminPermissionController::class,'edit']);
    Route::post('admin/permissions/update',[AdminPermissionController::class,'update'])->name('admin.permissions.update');
    
   

    

});

require __DIR__.'/auth.php';
