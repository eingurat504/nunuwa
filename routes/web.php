<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => '/appliances', 'as' => 'appliances.'], function () {
    Route::get('/', [CategoryController::class, 'getHomeAppliances'])->name('index');
});

Route::group(['prefix' => '/backpack', 'as' => 'backpack.'], function () {
    Route::get('/', [CategoryController::class, 'getBackPacks'])->name('index');
});

Route::group(['prefix' => '/electronics', 'as' => 'electronics.'], function () {
    Route::get('/', [CategoryController::class, 'getElectronics'])->name('index');
});

Route::group(['prefix' => '/furniture', 'as' => 'furniture.'], function () {
    Route::get('/', [CategoryController::class, 'getFurniture'])->name('index');
});

Route::group(['prefix' => '/cooking', 'as' => 'cooking.'], function () {
    Route::get('/', [CategoryController::class, 'getCookingEquipment'])->name('index');
});

Route::group(['prefix' => '/clothing', 'as' => 'clothing.'], function () {
    Route::get('/', [CategoryController::class, 'getClothing'])->name('index');
});

Route::group(['prefix' => '/audios', 'as' => 'audios.'], function () {
    Route::get('/', [CategoryController::class, 'getTVAudios'])->name('index');
});

Route::group(['prefix' => '/healthy', 'as' => 'healthy.'], function () {
    Route::get('/', [CategoryController::class, 'getHealthy'])->name('index');
});

Route::group(['prefix' => '/foot_wear', 'as' => 'foot_wear.'], function () {
    Route::get('/', [CategoryController::class, 'getShoes'])->name('index');
});

Route::group(['prefix' => '/travel', 'as' => 'travel.'], function () {
    Route::get('/', [CategoryController::class, 'getTravelOutDoor'])->name('index');
});

Route::group(['prefix' => '/smart_phones', 'as' => 'phones.'], function () {
    Route::get('/', [CategoryController::class, 'getSmartPhones'])->name('index');
});

Route::group(['prefix' => '/instruments', 'as' => 'instruments.'], function () {
    Route::get('/', [CategoryController::class, 'getMusicalInstruments'])->name('index');
});

Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
    Route::get('/{product}', [ProductController::class, 'showProduct'])->name('show');
});

Route::group(['prefix' => '/cart', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'showCart'])->name('index');
});

Route::group(['prefix' => '/checkout', 'as' => 'checkout.'], function () {
    Route::get('/', [CheckoutController::class, 'showCheckout'])->name('index');
    // Route::post('/', [CheckoutController::class, 'store'])->name('store');
});














