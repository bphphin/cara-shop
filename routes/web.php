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
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SubCateController;
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

Route::prefix('dashboard')->middleware(['isAdmin', 'auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin');

    //Product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('trash-list', [ProductController::class, 'trash'])->name('admin.product.trash');
        Route::match(['GET','POST'],'create',[ProductController::class,'store'])->name('admin.product.store');
        Route::match(['GET','POST'],'edit/{id}',[ProductController::class,'update'])->name('admin.product.update');
        Route::delete('soft-delete/{id}',[ProductController::class,'softDelete'])->name('admin.product.softDelete');
        Route::get('restore/{id}',[ProductController::class,'restore'])->name('admin.product.restore');
    });


    //Brand
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('trash-list', [BrandController::class, 'trash'])->name('admin.brand.trash');

        Route::get('create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('create', [BrandController::class, 'store'])->name('admin.brand.store');

        Route::delete('soft-delete/{id}', [BrandController::class, 'softDelete'])->name('admin.brand.softDelete');
        Route::get('restore/{id}', [BrandController::class, 'restore'])->name('admin.brand.restore');
        Route::delete('delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('edit/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    });

    // Categories
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('trash-list', [CategoryController::class, 'trash'])->name('admin.category.trash');

        Route::get('create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::delete('soft-delete/{id}', [CategoryController::class, 'softDelete'])->name('admin.category.softDelete');
//       Route::get('delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::get('restore/{id}', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');


        // Sub Category
        Route::prefix('sub-category')->group(function() {
           Route::match(['GET','POST'],'create',[SubCateController::class,'store'])->name('admin.cate.subcate.store');
           Route::match(['GET','POST'],'edit/{id}',[SubCateController::class,'update'])->name('admin.cate.subcate.update');

           Route::delete('soft-delete/{id}',[SubCateController::class,'softDelete'])->name('admin.cate.subcate.softDelete');

           Route::delete('delete/{id}',[SubCateController::class,'destroy'])->name('admin.cate.subcate.destroy');

           Route::get('trash-fashion',[SubCateController::class,'trashFashion'])->name('admin.cate.subcate.trashFashion');
           Route::get('trash-beauty',[SubCateController::class,'trashBeauty'])->name('admin.cate.subcate.trashBeauty');
           Route::get('trash-accessory',[SubCateController::class,'trashAccessory'])->name('admin.cate.subcate.trashAccessory');

           Route::get('restore/{id}',[SubCateController::class,'restore'])->name('admin.cate.subcate.restore');
        });
    });


    //Attribute
    Route::prefix('attribute')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('admin.att.index');

        //Size
        Route::prefix('size')->group(function () {

            Route::get('/', [SizeController::class, 'index'])->name('admin.att.size.index');
            Route::get('detail/{id}', [SizeController::class, 'show'])->name('admin.att.size.show');
            Route::match(['GET', 'POST'], 'create', [SizeController::class, 'store'])->name('admin.att.size.store');
            Route::delete('delete/{id}', [SizeController::class, 'destroy'])->name('admin.att.size.destroy');
//            Route::get('delete/{id}',[SizeController::class,'destroy'])->name('admin.att.size.destroy');
            Route::match(['GET', 'POST'], 'edit/{id}', [SizeController::class, 'update'])->name('admin.att.size.update');
        });

        //Color
        Route::prefix('color')->group(function () {
            Route::match(['GET', 'POST'], 'create', [ColorController::class, 'store'])->name('admin.att.color.store');
            Route::match(['GET', 'POST'], 'edit/{id}', [ColorController::class, 'update'])->name('admin.att.color.update');
            Route::delete('delete/{id}', [ColorController::class, 'destroy'])->name('admin.att.color.destroy');
        });
    });
    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customer.index');
        Route::match(['GET', 'POST'], 'edit/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
    });
});


// Clients
Route::get('/', [HomeController::class, 'home'])->name('home-client');


// Login

Route::get('login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
// Register
Route::get('register', [AuthController::class, 'registerForm'])->name('auth.registerForm');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::view('not-found', 'errors.404')->name('404');
