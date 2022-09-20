<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard.get')->middleware('admin');

Route::prefix('admin')->group(function () {

    //AdminController
    Route::get('/login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login.get');
    Route::post('/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login.post');
    Route::get('/register', [App\Http\Controllers\AdminController::class, 'showRegisterForm'])->name('admin.register.get');
    Route::post('/register', [App\Http\Controllers\AdminController::class, 'adminRegister'])->name('admin.register.post');
    Route::post('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/profile', [App\Http\Controllers\AdminController::class, 'showAdminProfile'])->name('admin.profile.get')->middleware('admin');
    Route::get('get-district-info/', [App\Http\Controllers\AdminController::class, 'adminGetDistrictInfo'])->name('admin.admin-get-district');
    Route::get('get-ward-info/', [App\Http\Controllers\AdminController::class, 'adminGetWardInfo'])->name('admin.admin-get-ward');
    Route::post('/profile/update', [App\Http\Controllers\AdminController::class, 'updateAdminProfile'])->name('admin.update.profile');

    //CategoryController
    Route::get('/category/list', [App\Http\Controllers\CategoryController::class, 'getListCategory'])->name('admin.category.list');
    Route::post('/category/add', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('admin.category.add');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('admin.category.update');
    Route::post('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('admin.category.edit');
    Route::post('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('admin.category.delete');
});