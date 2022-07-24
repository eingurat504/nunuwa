<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CartController;
// use App\Http\Controllers\WishlistController;
// use App\Http\Controllers\CheckoutController;

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
Route::post('/logout', 'Auth\AuthController@logout')->name('admin.logout');

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

        // Category
        Route::group(['prefix' => 'category_type', 'as' => 'category_types.'], function () {
            Route::get('/', 'CategoryTypeController@index')->name('index');
            Route::get('/create','CategoryTypeController@create')->name('create');
            Route::post('/store','CategoryTypeController@store')->name('store');
            Route::get('/{category_type}','CategoryTypeController@show')->name('show');
            Route::get('/{category_type}/edit','CategoryTypeController@edit')->name('edit');
            Route::put('/{category_type}/update','CategoryTypeController@update')->name('update');
            Route::get('/{category_type}/attached_images','CategoryTypeController@attachedImages')->name('attached');
            Route::post('/{category_type}/attach','CategoryTypeController@attachImages')->name('attach');
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

    // Order
    Route::group(['prefix' => 'order', 'as' => 'orders.'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        // Route::get('/create','OrderController@create')->name('create');
        // Route::post('/store','OrderController@store')->name('store');
        Route::get('/{order}','OrderController@show')->name('show');
        Route::get('/{order}/edit','OrderController@edit')->name('edit');
        Route::put('/{order}/update','OrderController@update')->name('update');
    });

       // Product options
    Route::group(['prefix' => 'product_option', 'as' => 'product_options.'], function () {
        Route::get('/', 'OptionController@index')->name('index');
        Route::get('/create','OptionController@create')->name('create');
        Route::post('/store','OptionController@store')->name('store');
        Route::get('/{option}','OptionController@show')->name('show');
        Route::get('/{option}/edit','OptionController@edit')->name('edit');
        Route::put('/{option}/update','OptionController@update')->name('update');
        Route::delete('/{option}/delete','OptionController@delete')->name('delete');
    });

        // Product options
    Route::group(['prefix' => 'option_group', 'as' => 'option_groups.'], function () {
        Route::get('/', 'OptionGroupController@index')->name('index');
        Route::get('/create','OptionGroupController@create')->name('create');
        Route::post('/store','OptionGroupController@store')->name('store');
        Route::get('/{group}','OptionGroupController@show')->name('show');
        Route::get('/{group}/edit','OptionGroupController@edit')->name('edit');
        Route::put('/{group}/update','OptionGroupController@update')->name('update');
        Route::delete('/{group}/delete','OptionGroupController@delete')->name('delete');
    });
    
});

