<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login','Auth\AuthController@getlogin')->name('admin.login.index');
Route::post('/admin/login', 'Auth\AuthController@login')->name('admin.login');
Route::post('/admin/logout', 'Auth\AuthController@logout')->name('admin.logout');

Route::pattern('category', '^\d+$');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
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

        Route::pattern('category_type', '^\d+$');

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

    Route::pattern('product', '^\d+$');

    // Product
    Route::group(['prefix' => 'product', 'as' => 'products.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create','ProductController@create')->name('create');
        Route::post('/store','ProductController@store')->name('store');
        Route::get('/{product}','ProductController@show')->name('show');
        Route::get('/{product}/edit','ProductController@edit')->name('edit');
        Route::put('/{product}/update','ProductController@update')->name('update');
        Route::get('/{product}/attached_images','ProductController@attachedImages')->name('attached');
        Route::put('/{product}/attach','ProductController@attachImages')->name('attach');
    });

    Route::pattern('order', '^\d+$');

    // Order
    Route::group(['prefix' => 'order', 'as' => 'orders.'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        // Route::get('/create','OrderController@create')->name('create');
        // Route::post('/store','OrderController@store')->name('store');
        Route::get('/{order}','OrderController@show')->name('show');
        Route::get('/{order}/edit','OrderController@edit')->name('edit');
        Route::put('/{order}/update','OrderController@update')->name('update');
    });

    Route::pattern('option', '^\d+$');
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

    Route::pattern('group', '^\d+$');

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

    
    Route::pattern('code', '^\d+$');

    // Coupon code
    Route::group(['prefix' => 'coupon_code', 'as' => 'coupon_codes.'], function () {
        Route::get('/', 'CouponController@index')->name('index');
        Route::get('/create','CouponController@create')->name('create');
        Route::post('/store','CouponController@store')->name('store');
        Route::get('/{code}','CouponController@show')->name('show');
        Route::get('/{code}/edit','CouponController@edit')->name('edit');
        Route::put('/{code}/update','CouponController@update')->name('update');
        Route::delete('/{code}/delete','CouponController@delete')->name('delete');
    });

        Route::pattern('article', '^\d+$');
      // Article
      Route::group(['prefix' => 'article', 'as' => 'articles.'], function () {
        Route::get('/', 'ArticleController@index')->name('index');
        Route::get('/create','ArticleController@create')->name('create');
        Route::post('/store','ArticleController@store')->name('store');
        Route::get('/{article}','ArticleController@show')->name('show');
        Route::get('/{article}/edit','ArticleController@edit')->name('edit');
        Route::put('/{article}/update','ArticleController@update')->name('update');
        Route::delete('/{article}/delete','ArticleController@delete')->name('delete');
    });
    
});

