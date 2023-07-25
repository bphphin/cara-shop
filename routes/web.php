<?php

use App\Http\Controllers\Clients\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AttributeController;
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
        Route::get('restore/{id}',[BrandController::class,'restore'])->name('admin.brand.restore');
        Route::delete('delete/{id}',[BrandController::class,'destroy'])->name('admin.brand.destroy');
        Route::get('edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
        Route::post('edit/{id}',[BrandController::class,'update'])->name('admin.brand.update');
    });

    // Categories
    Route::prefix('category')->group(function() {
       Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
       Route::get('trash-list',[CategoryController::class,'trash'])->name('admin.category.trash');

       Route::get('create',[CategoryController::class,'create'])->name('admin.category.create');
       Route::post('create',[CategoryController::class,'store'])->name('admin.category.store');
       Route::delete('soft-delete/{id}',[CategoryController::class,'softDelete'])->name('admin.category.softDelete');
//       Route::get('delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
       Route::delete('delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
       Route::get('restore/{id}',[CategoryController::class,'restore'])->name('admin.category.restore');
       Route::get('edit/{id}',[BrandController::class,'edit'])->name('admin.category.edit');
       Route::post('edit/{id}',[BrandController::class,'update'])->name('admin.category.update');
    });


    //Attribute
    Route::prefix('attribute')->group(function() {
        Route::get('/',[AttributeController::class,'index'])->name('admin.att.index');
        Route::prefix('size')->group(function() {
            Route::get('/',[SizeController::class,'index'])->name('admin.att.size.index');
        });
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
