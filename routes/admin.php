<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Category\ElectronicController;
use App\Http\Controllers\Category\FurnitureController;
use App\Http\Controllers\Category\ClothingController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;

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

// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login','Auth\AuthController@getlogin')->name('admin.login.index');
Route::post('/login', 'Auth\AuthController@login')->name('admin.login');
Route::get('/logout', 'Auth\AuthController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
    // Admin Dashboard
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard'); 

    // Category
    Route::group(['prefix' => 'category', 'as' => 'categories.'], function () {
        Route::get('/', 'AdminCategoryController@index')->name('index');
        Route::get('/create','AdminCategoryController@create')->name('create');
        Route::post('/store','AdminCategoryController@store')->name('store');
        Route::get('/{category}','AdminCategoryController@show')->name('show');
        Route::get('/{category}/edit','AdminCategoryController@edit')->name('edit');
        Route::put('/{category}/update','AdminCategoryController@update')->name('update');
        Route::get('/{category}/attached_images','AdminCategoryController@attachedImages')->name('attached');
        Route::post('/{category}/attach','AdminCategoryController@attachImages')->name('attach');
    });

    // Product
    Route::group(['prefix' => 'product', 'as' => 'products.'], function () {
        Route::get('/', 'AdminProductController@index')->name('index');
        Route::get('/create','AdminProductController@create')->name('create');
        Route::post('/store','AdminProductController@store')->name('store');
        Route::get('/{product}','AdminProductController@show')->name('show');
        Route::get('/{product}/edit','AdminProductController@edit')->name('edit');
        Route::put('/{product}/update','AdminProductController@update')->name('update');
        Route::get('/{product}/attached_images','AdminProductController@attachedImages')->name('attached');
        Route::post('/{product}/attach','AdminProductController@attachImages')->name('attach');
    });

});










