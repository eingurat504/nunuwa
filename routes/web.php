<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/electronics', [App\Http\Controllers\HomeController::class, 'index'])->name('electronics');
// Route::get('/appliances', [App\Http\Controllers\HomeController::class, 'index'])->name('appliances');
// Route::get('/clothing', [App\Http\Controllers\HomeController::class, 'index'])->name('clothing');
// Route::get('/furniture', [App\Http\Controllers\HomeController::class, 'index'])->name('furniture');
// Route::get('/healthy', [App\Http\Controllers\HomeController::class, 'index'])->name('healthy');
// Route::get('/musical_instruments', [App\Http\Controllers\HomeController::class, 'index'])->name('musical_instruments');
// Route::get('/phones', [App\Http\Controllers\HomeController::class, 'index'])->name('phones');
// Route::get('/shoes', [App\Http\Controllers\HomeController::class, 'index'])->name('shoes');
// Route::get('/travel', [App\Http\Controllers\HomeController::class, 'index'])->name('travel');
// Route::get('/tv_audio', [App\Http\Controllers\HomeController::class, 'index'])->name('tv_audio');


Route::group(['prefix' => '/electronics', 'as' => 'electronics.'], function () {
    Route::get('/', [CategoryController::class, 'getElectronics'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/furniture', 'as' => 'furniture.'], function () {
    Route::get('/', [CategoryController::class, 'getFurniture'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/cooking', 'as' => 'cooking.'], function () {
    Route::get('/', [CategoryController::class, 'getCookingEqupment'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/clothing', 'as' => 'clothing.'], function () {
    Route::get('/', [CategoryController::class, 'getClothing'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/audios', 'as' => 'audios.'], function () {
    Route::get('/', [CategoryController::class, 'getTVAudios'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});


Route::group(['prefix' => '/healthy', 'as' => 'healthy.'], function () {
    Route::get('/', [CategoryController::class, 'getTVAudios'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/foot_wear', 'as' => 'foot_wear.'], function () {
    Route::get('/', [CategoryController::class, 'getShoes'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});


Route::group(['prefix' => '/travel', 'as' => 'travel.'], function () {
    Route::get('/', [CategoryController::class, 'getTravel'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});


Route::group(['prefix' => '/phones', 'as' => 'phones.'], function () {
    Route::get('/', [CategoryController::class, 'getPhones'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/instruments', 'as' => 'instruments.'], function () {
    Route::get('/', [CategoryController::class, 'getInstruments'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/', [CategoryController::class, 'index'])->name('index');     
    // Route::get('/', [CategoryController::class, 'index'])->name('index');
    // Route::get('/{product}', [ProductController::class, 'show'])->name('show');
});











