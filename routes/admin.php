<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
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

// Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login','Auth\AuthController@getlogin')->name('admin.login.index');
Route::post('/login', 'Auth\AuthController@login')->name('admin.login');
Route::get('/logout', 'Auth\AuthController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin','middleware' => 'admin', 'as' => 'admin.'], function () {
    // Admin Dashboard
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard'); 

    // Category
    Route::group(['prefix' => 'category', 'as' => 'categories.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create','CategoryController@create')->name('create');
        Route::post('/store','CategoryController@store')->name('store');
        Route::get('/{category}','CategoryController@show')->name('show');
        Route::get('/{category}/edit','CategoryController@edit')->name('edit');
        Route::put('/{category}/update','CategoryController@update')->name('update');
        Route::get('/{category}/attached_images','CategoryController@attachedImages')->name('attached');
        Route::post('/{category}/attach','CategoryController@attachImages')->name('attach');
    });

    // Product
    Route::group(['prefix' => 'product', 'as' => 'products.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create','ProductController@create')->name('create');
        Route::post('/store','ProductController@store')->name('store');
        Route::get('/{product}','ProductController@show')->name('show');
        Route::get('/{product}/edit','ProductController@edit')->name('edit');
        Route::put('/{product}/update','ProductController@update')->name('update');
        Route::get('/{product}/attached_images','ProductController@attachedImages')->name('attached');
        Route::post('/{product}/attach','ProductController@attachImages')->name('attach');
    });

});










