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


Route::get('/', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard.get');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login.get');
Route::post('/admin/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('admin.login.post');
Route::get('/admin/register', [App\Http\Controllers\AdminController::class, 'showRegisterForm'])->name('admin.register.get');
Route::post('/admin/register', [App\Http\Controllers\AdminController::class, 'adminRegister'])->name('admin.register.post');
Route::post('admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/profile', [App\Http\Controllers\AdminController::class, 'showAdminProfile'])->name('admin.profile.get');
