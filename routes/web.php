<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\ProfileController;
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

    // Post
    Route::get('/admin/posts/categories',[AdminCategoryController::class,'view'])->name('admin.posts.categories');
    Route::post('/admin/posts/categories/store',[AdminCategoryController::class,'store'])->name('admin.posts.categories.store');
    Route::post('/admin/posts/categories/updateStatus', [AdminCategoryController::class,'updateStatus']);
    Route::get('/admin/posts/categories/edit',[ AdminCategoryController::class,'edit']);
    Route::post('/admin/post/categories/update',[AdminCategoryController::class,'update'])->name('admin.posts.categories.update');
    Route::get('/admin/posts/categories/destroy/{category}',[AdminCategoryController::class,'destroy'])->name('admin.posts.categories.destroy');
    Route::post('/admin/posts/categories/action',[AdminCategoryController::class,'action'])->name('admin.posts.categories.action');
    
    Route::get('/admin/posts',[AdminPostController::class,'view'])->name('admin.posts');

    // Product
    Route::get('/admin/products/categories',[AdminCategoryController::class,'view'])->name('admin.products.categories');
    Route::post('/admin/products/categories/store',[AdminCategoryController::class,'store'])->name('admin.products.categories.store');
    Route::post('/admin/products/categories/updateStatus', [AdminCategoryController::class,'updateStatus']);
    Route::get('/admin/products/categories/edit',[ AdminCategoryController::class,'edit']);
    Route::post('/admin/products/categories/update',[AdminCategoryController::class,'update'])->name('admin.products.categories.update');
    Route::get('/admin/products/categories/destroy/{category}',[AdminCategoryController::class,'destroy'])->name('admin.products.categories.destroy');
    Route::post('/admin/products/categories/action',[AdminCategoryController::class,'action'])->name('admin.products.categories.action');

    Route::get('/admin/products',[AdminPostController::class,'view'])->name('admin.products');
    
   

    

});

require __DIR__.'/auth.php';
