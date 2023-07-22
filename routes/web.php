<?php

use App\Http\Controllers\Clients\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Admin

Route::prefix('admin')->middleware(['isAdmin','auth'])->group(function() {
    Route::get('/',[DashboardController::class,'index'])->name('admin');
});
// Clients
Route::get('/',[HomeController::class,'home'])->name('home-client');


// Login

Route::get('login',[AuthController::class,'loginForm'])->name('auth.loginForm');
Route::post('login',[AuthController::class,'login'])->name('auth.login');
// Register
Route::get('register',[AuthController::class,'registerForm'])->name('auth.registerForm');
Route::post('register',[AuthController::class,'register'])->name('auth.register');
// Logout
Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
Route::view('err','errors.404');
