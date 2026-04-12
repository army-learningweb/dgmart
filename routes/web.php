<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminFileController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminTrashController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/validation',[ValidationController::class, 'validation']);

// =============================
// ADMIN
// =============================

Route::get('/admin/dashboard',[DashboardController::class,'view'])->middleware(['auth','verified'])->name('dashboard');
Route::middleware('auth')->group(function () {

    // File manager
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        Lfm::routes();
    });

    // File
    Route::post('/admin/file/upload',[AdminFileController::class,'upload']);
    Route::post('/admin/file/remove',[AdminFileController::class,'remove']);

    // Admin Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User
    Route::get('/admin/users',[AdminUserController::class,'list'])->name('admin.users');
    Route::post('/admin/users',[AdminUserController::class,'list_filter']);
    
    Route::post('/admin/users/store',[AdminUserController::class,'store'])->name('admin.users.store');
    Route::post('/admin/users/destroy/{user}',[AdminUserController::class,'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/edit',[AdminUserController::class,'edit'])->name('admin.users.edit');
    Route::post('/admin/users/update',[AdminUserController::class,'update'])->name('admin.users.update');
    Route::post('/admin/users/updateStatus',[AdminUserController::class,'updateStatus']);
    Route::post('/admin/users/action',[AdminUserController::class,'action'])->name('admin.users.action');

    // Role
    Route::get('/admin/roles',[AdminRoleController::class,'list'])->name('admin.roles');
    Route::post('/admin/roles/store',[AdminRoleController::class,'store'])->name('admin.roles.store');
    Route::post('/admin/roles/destroy/{role}',[AdminRoleController::class,'destroy'])->name('admin.roles.destroy');
    Route::get('/admin/roles/edit',[AdminRoleController::class,'edit'])->name('admin.roles.edit');
    Route::post('/admin/roles/update',[AdminRoleController::class,'update'])->name('admin.roles.update');

    // Permission
    Route::get('/admin/permissions',[AdminPermissionController::class,'list'])->name('admin.permissions');
    Route::post('/admin/permissions/store',[AdminPermissionController::class,'store'])->name('admin.permissions.store');
    Route::get('/admin/permissions/destroy/{permission}',[AdminPermissionController::class,'destroy'])->name('admin.permissions.destroy');
    Route::get('/admin/permissions/edit',[AdminPermissionController::class,'edit']);
    Route::post('admin/permissions/update',[AdminPermissionController::class,'update'])->name('admin.permissions.update');

    // Post
    Route::get('/admin/posts/categories',[AdminCategoryController::class,'list'])->name('admin.posts.categories');
    Route::post('/admin/posts/categories/store',[AdminCategoryController::class,'store'])->name('admin.posts.categories.store');
    Route::post('/admin/posts/categories/updateStatus', [AdminCategoryController::class,'updateStatus']);
    Route::get('/admin/posts/categories/edit',[ AdminCategoryController::class,'edit']);
    Route::post('/admin/post/categories/update',[AdminCategoryController::class,'update'])->name('admin.posts.categories.update');
    Route::post('/admin/posts/categories/destroy/{category}',[AdminCategoryController::class,'destroy'])->name('admin.posts.categories.destroy');
    Route::post('/admin/posts/categories/action',[AdminCategoryController::class,'action'])->name('admin.posts.categories.action');
    
    Route::get('/admin/posts',[AdminPostController::class,'list'])->name('admin.posts');
    Route::post('/admin/posts',[AdminPostController::class,'list_filter']);
    Route::post('/admin/posts/store',[AdminPostController::class,'store'])->name('admin.posts.store');
    Route::post('/admin/posts/destroy/{post}',[AdminPostController::class,'destroy'])->name('admin.posts.destroy');
    Route::get('admin/posts/edit',[AdminPostController::class,'edit']);
    Route::post('/admin/posts/update',[AdminPostController::class,'update'])->name('admin.posts.update');
    Route::post('/admin/posts/action',[AdminPostController::class,'action'])->name('admin.posts.action');
    Route::post('/admin/posts/updateStatus', [AdminPostController::class,'updateStatus']);
    
    // Product
    Route::get('/admin/products/categories',[AdminCategoryController::class,'list'])->name('admin.products.categories');
    Route::post('/admin/products/categories/store',[AdminCategoryController::class,'store'])->name('admin.products.categories.store');
    Route::post('/admin/products/categories/updateStatus', [AdminCategoryController::class,'updateStatus']);
    Route::get('/admin/products/categories/edit',[ AdminCategoryController::class,'edit']);
    Route::post('/admin/products/categories/update',[AdminCategoryController::class,'update'])->name('admin.products.categories.update');
    Route::post('/admin/products/categories/destroy/{category}',[AdminCategoryController::class,'destroy'])->name('admin.products.categories.destroy');
    Route::post('/admin/products/categories/action',[AdminCategoryController::class,'action'])->name('admin.products.categories.action');

    Route::get('/admin/products',[AdminProductController::class,'list'])->name('admin.products');
    Route::post('/admin/products',[AdminProductController::class,'list_filter']);
    Route::post('/admin/products/store',[AdminProductController::class,'store'])->name('admin.products.store');
    Route::post('/admin/products/destroy/{product}',[AdminProductController::class,'destroy'])->name('admin.products.destroy');
    Route::get('admin/products/edit',[AdminProductController::class,'edit']);
    Route::post('/admin/products/update',[AdminProductController::class,'update'])->name('admin.products.update');
    Route::post('/admin/products/action',[AdminProductController::class,'action'])->name('admin.products.action');
    Route::post('/admin/products/updateStatus', [AdminProductController::class,'updateStatus']);

    // Slider
    Route::get('/admin/sliders',[AdminSliderController::class,'list'])->name('admin.sliders');
    Route::post('/admin/sliders',[AdminSliderController::class,'list_filter']);

    Route::post('/admin/sliders/updateOrder',[AdminSliderController::class,'updateOrder']);
    Route::post('/admin/sliders/store',[AdminSliderController::class,'store'])->name('admin.sliders.store');
    Route::post('/admin/sliders/destroy/{slider}',[AdminSliderController::class,'destroy'])->name('admin.sliders.destroy');
    Route::get('/admin/sliders/edit',[AdminSliderController::class,'edit'])->name('admin.sliders.edit');
    Route::post('/admin/sliders/update',[AdminSliderController::class,'update'])->name('admin.sliders.update');
    Route::post('/admin/sliders/updateStatus',[AdminSliderController::class,'updateStatus']);
    Route::post('/admin/sliders/action',[AdminSliderController::class,'action'])->name('admin.sliders.action');

    // Menu
    Route::get('/admin/menus',[AdminMenuController::class,'list'])->name('admin.menus');
    Route::post('/admin/menus/store',[AdminMenuController::class,'store'])->name('admin.menus.store');
    Route::get('/admin/menus/edit',[AdminMenuController::class,'edit'])->name('admin.menus.edit');
    Route::post('/admin/menus/update',[AdminMenuController::class,'update'])->name('admin.menus.update');
    Route::post('/admin/menus/action',[AdminMenuController::class,'action'])->name('admin.menus.action');
    Route::post('admin/menus/destroy/{menu}',[AdminMenuController::class,'destroy'])->name('admin.menus.destroy');
    Route::post('/admin/menus/updateStatus',[AdminMenuController::class,'updateStatus']);
    Route::post('/admin/menus/action',[AdminMenuController::class,'action'])->name('admin.menus.action');

    // Trash
    Route::get('/admin/trashs',[AdminTrashController::class,'list'])->name('admin.trashs');
    Route::post('/admin/trashs/destroy_all',[AdminTrashController::class,'destroy_all'])->name('admin.trashs.destroy_all');

    
});

require __DIR__.'/auth.php';
