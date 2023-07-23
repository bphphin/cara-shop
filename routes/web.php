<?php

use App\Http\Controllers\Clients\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
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
    // Dashboard
    Route::get('/',[DashboardController::class,'index'])->name('admin');

    //Product
    Route::prefix('san-pham')->group(function() {
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
    });
    Route::prefix('thuong-hieu')->group(function() {
        Route::get('/',[BrandController::class,'index'])->name('admin.brand.index');
    });
    Route::prefix('danh-muc')->group(function() {
       Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
    });
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
