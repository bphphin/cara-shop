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
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SubCateController;
use App\Http\Controllers\Clients\SiteController;
use App\Http\Controllers\Clients\Users\ProfileController;
use App\Http\Controllers\Clients\CartController;

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


//Auth Module
Route::prefix('account')->controller(AuthController::class)->group(function () {
    //Login
    Route::match(['GET', 'POST'], 'login', 'login')->name('account.login');
    //Register
    Route::match(['GET', 'POST'], 'register', 'register')->name('account.register');
    // Logout
    Route::get('logout', 'logout')->name('account.logout');
});


// Admin
Route::prefix('dashboard')->middleware(['isAdmin', 'auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin');

    //Product Module
    Route::prefix('product')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('admin.product.index');
        Route::get('trash-list', 'trash')->name('admin.product.trash');
        Route::match(['GET', 'POST'], 'create', 'store')->name('admin.product.store');
        Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.product.update');
        Route::delete('soft-delete/{id}', 'softDelete')->name('admin.product.softDelete');
        Route::delete('delete/{id}', 'destroy')->name('admin.product.destroy');
        Route::get('restore/{id}', 'restore')->name('admin.product.restore');
    });

    //Brand Module
    Route::prefix('brand')->controller(BrandController::class)->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('trash-list', [BrandController::class, 'trash'])->name('admin.brand.trash');
        Route::match(['GET', 'POST'], 'create', 'store')->name('admin.brand.store');
        Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.brand.update');
        Route::get('restore/{id}', 'restore')->name('admin.brand.restore');
        Route::delete('soft-delete/{id}', 'softDelete')->name('admin.brand.softDelete');
        Route::delete('delete/{id}', 'destroy')->name('admin.brand.destroy');
    });

    // Categories Module
    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.category.index');
        Route::get('trash-list', 'trash')->name('admin.category.trash');
        Route::get('restore/{id}', 'restore')->name('admin.category.restore');
        Route::match(['GET','POST'],'create','store')->name('admin.category.store');
        Route::match(['GET','POST'],'edit/{id}', 'update')->name('admin.category.update');
        Route::delete('soft-delete/{id}', 'softDelete')->name('admin.category.softDelete');
        Route::delete('delete/{id}', 'destroy')->name('admin.category.destroy');


        // Sub Category Module
        Route::prefix('sub-category')->controller(SubCateController::class)->group(function () {
            Route::get('trash-fashion', 'trashFashion')->name('admin.cate.subcate.trashFashion');
            Route::get('trash-beauty', 'trashBeauty')->name('admin.cate.subcate.trashBeauty');
            Route::get('trash-accessory', 'trashAccessory')->name('admin.cate.subcate.trashAccessory');
            Route::get('restore/{id}', 'restore')->name('admin.cate.subcate.restore');
            Route::match(['GET', 'POST'], 'create', 'store')->name('admin.cate.subcate.store');
            Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.cate.subcate.update');
            Route::delete('soft-delete/{id}', 'softDelete')->name('admin.cate.subcate.softDelete');
            Route::delete('delete/{id}', 'softDelete')->name('admin.cate.subcate.destroy');
        });
    });


    // Order Module
    Route::prefix('order')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index')->name('admin.order.index');
        Route::get('/{id}', 'show')->name('admin.order.show');
    });

    //Attribute Module
    Route::prefix('attribute')->group(function () {
        Route::get('/', [AttributeController::class, 'index'])->name('admin.att.index');

        //Size Module
        Route::prefix('size')->controller(SizeController::class)->group(function () {
            Route::get('/', 'index')->name('admin.att.size.index');
            Route::get('detail/{id}', 'show')->name('admin.att.size.show');
            Route::match(['GET', 'POST'], 'create', 'store')->name('admin.att.size.store');
            Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.att.size.update');
            Route::delete('delete/{id}', 'destroy')->name('admin.att.size.destroy');
        });

        //Color Module
        Route::prefix('color')->controller(ColorController::class)->group(function () {
            Route::match(['GET', 'POST'], 'create', 'store')->name('admin.att.color.store');
            Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.att.color.update');
            Route::delete('delete/{id}', 'destroy')->name('admin.att.color.destroy');
        });
    });
    Route::prefix('customer')->controller(CustomerController::class)->group(function () {
        Route::get('/', 'index')->name('admin.customer.index');
        Route::match(['GET', 'POST'], 'edit/{id}', 'update')->name('admin.customer.update');
    });
});


// Clients
Route::get('/', [HomeController::class, 'home'])->name('home-client');

Route::controller(SiteController::class)->group(function () {
    Route::get('product/{id}/{slug?}', 'showProduct')->name('home.site.product.show');
    Route::get('shop-page', 'shop')->name('home.site.product.shop');
    Route::get('cate-detail/{id}', 'detailCate')->name('home.site.cate.detail');
    Route::get('product-from-sub-cate/{id}', 'productFromSubCate')->name('home.site.product.proFromSubCate');
    //Search product
    Route::post('search-query', 'searchProductHome')->name('home.site.product.search');
    //About page
    Route::get('about', 'about')->name('home.site.about');
    // Blog page
    Route::get('blog', 'blog')->name('home.site.blog');
    // Contact page
    Route::get('contact', 'contact')->name('home.site.contact');
});

// Cart Module
Route::middleware(['isLogin'])->prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('/', 'cart')->name('home.cart');
    Route::post('add-to-card', 'addToCart')->name('home.cart.addToCart');
    Route::post('update-card', 'updateCart')->name('home.cart.updateCart');
    Route::get('cart-checkout', 'checkout')->name('home.cart.checkout');
    Route::get('cart-delete/{id}', 'destroy')->name('home.cart.destroy');
    Route::post('complete-checkout', 'completeCheckout')->name('home.cart.completeCheckout');
    Route::view('order-success', 'clients.pages.orders.order-success')->name('home.cart.order');
});


// Profile
Route::middleware(['isLogin'])->prefix('profile')->controller(ProfileController::class)->group(function () {
    Route::match(['GET', 'POST'], '/', 'profile')->name('clients.profile');
});

