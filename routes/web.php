<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Category\ElectronicController;
use App\Http\Controllers\Category\FurnitureController;

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
    Route::get('/accessories', [ElectronicController::class, 'getAccessories'])->name('accessories.index');
    Route::get('/shoes', [ElectronicController::class, 'getMonitors'])->name('shoes.index');
    Route::get('/laptops', [ElectronicController::class, 'getLaptops'])->name('laptops.index');
    Route::get('/printers', [ElectronicController::class, 'getPrinters'])->name('printers.index');
    Route::get('/trending', [ElectronicController::class, 'getTablets'])->name('tablets.index');
    Route::get('/best_sellers', [ElectronicController::class, 'getDrives'])->name('drivers.index');
    Route::get('/new_arrivals', [ElectronicController::class, 'getAccessories'])->name('accessories.index');
});

Route::group(['prefix' => '/furniture', 'as' => 'furniture.'], function () {
    Route::get('/', [CategoryController::class, 'getFurniture'])->name('index');
    Route::get('/chairs', [FurnitureController::class, 'getChairs'])->name('chairs.index');
    Route::get('/coffee_tables', [FurnitureController::class, 'getCoffeTables'])->name('coffee_tables.index');
    Route::get('/dressers', [FurnitureController::class, 'getDressers'])->name('dressers.index');
    Route::get('/beds', [FurnitureController::class, 'getBeds'])->name('beds.index');
    Route::get('/cabinets', [FurnitureController::class, 'getNightStands'])->name('cabinets.index');
    Route::get('/night_stands', [FurnitureController::class, 'getNightStands'])->name('night_stands.index');
    Route::get('/dining_sets', [FurnitureController::class, 'getDiningSets'])->name('dining_sets.index');
    Route::get('/bedding_room', [FurnitureController::class, 'getBeddings'])->name('beddings.index');
    Route::get('/decorations', [FurnitureController::class, 'getDecorations'])->name('decorations.index');
    Route::get('/kitchen', [FurnitureController::class, 'getKitchenCabinates'])->name('kitchen_cabinets.index');
    Route::get('/tables', [FurnitureController::class, 'getTables'])->name('tables.index');
});

Route::group(['prefix' => '/cooking', 'as' => 'cooking.'], function () {
    Route::get('/', [CategoryController::class, 'getCookingEquipment'])->name('index');
});

Route::group(['prefix' => '/clothing', 'as' => 'clothing.'], function () {
    Route::get('/', [CategoryController::class, 'getClothing'])->name('index');
    Route::get('/accessories', [ClothingController::class, 'getAccessories'])->name('accessories.index');
    Route::get('/shoes', [ClothingController::class, 'getShoes'])->name('shoes.index');
    Route::get('/bags', [ClothingController::class, 'getBags'])->name('bags.index');
    Route::get('/jewelery_watches', [ClothingController::class, 'getJewelery'])->name('watches.index');
    Route::get('/trending', [ClothingController::class, 'getTrending'])->name('index');
    Route::get('/best_sellers', [ClothingController::class, 'getBestSellers'])->name('sellers.index');
    Route::get('/new_arrivals', [ClothingController::class, 'getArrivals'])->name('arrivals.index');
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
    Route::post('/', [CheckoutController::class, 'store'])->name('store');
});














