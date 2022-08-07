<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Category\ElectronicController;
use App\Http\Controllers\Category\FurnitureController;
use App\Http\Controllers\Category\ClothingController;
use App\Http\Controllers\CouponCodeController;

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

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/contact_us', [HomeController::class, 'contact_us'])->name('contact_us.index');
    Route::get('/faq', [HomeController::class, 'faqs'])->name('faqs.index');
    Route::get('/terms_n_conditons', [HomeController::class, 'terms_n_conditons'])->name('terms_n_conditons.index');
    Route::get('/about_us', [HomeController::class, 'about_us'])->name('about_us.index');
});

// Route::group(['prefix' => '/appliances', 'as' => 'appliances.'], function () {
//     Route::get('/', [CategoryController::class, 'getHomeAppliances'])->name('index');
// });
// Route::group(['prefix' => '/backpack', 'as' => 'backpack.'], function () {
//     Route::get('/', [CategoryController::class, 'getBackPacks'])->name('index');
// });


Route::group(['prefix' => '/category', 'as' => 'categories.'], function () {
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
    Route::get('/{product}', [ProductController::class, 'showProduct'])->name('show');
});

Route::group(['prefix' => '/cart', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'showCart'])->name('index');
    Route::post('/', [CartController::class, 'store'])->name('store');
    Route::put('/', [CartController::class, 'store'])->name('store');
    Route::delete('/{item}', [CartController::class, 'destroy'])->name('destroy');
    Route::get('/reset', [CartController::class, 'reset'])->name('reset');
});

Route::group(['prefix' => '/wishlist', 'as' => 'wishlist.'], function () {
    Route::get('/', [WishlistController::class, 'showWishlist'])->name('index');
});

Route::group(['prefix' => '/checkout', 'as' => 'checkout.'], function () {
    Route::get('/', [CheckoutController::class, 'showCheckout'])->name('index');
    Route::post('/', [CheckoutController::class, 'store'])->name('store');
});


Route::group(['prefix' => '/coupon_code', 'as' => 'coupon_code.'], function () {
    Route::post('/', [CouponCodeController::class, 'store'])->name('store');
});













