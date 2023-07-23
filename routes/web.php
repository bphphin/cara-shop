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
    Route::prefix('product')->group(function() {
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
    });


    //Brand
    Route::prefix('brand')->group(function() {
        Route::get('/',[BrandController::class,'index'])->name('admin.brand.index');
        Route::get('trash-list',[BrandController::class,'trash'])->name('admin.brand.trash');
        Route::get('create',[BrandController::class,'create'])->name('admin.brand.create');
        Route::post('create',[BrandController::class,'store'])->name('admin.brand.store');
        Route::delete('soft-delete/{id}',[BrandController::class,'softDelete'])->name('admin.brand.softDelete');
    });

    // Categories
    Route::prefix('category')->group(function() {
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
Route::view('not-found','errors.404')->name('404');
