<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
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
Route::get('admin/login','Auth\AuthController@getlogin')->name('admin.login.index');
Route::post('admin/login', 'Auth\AuthController@login')->name('admin.login');
Route::get('admin/logout', 'Auth\AuthController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
    // Admin Dashboard
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard'); 

    // categories
    Route::get('/categories','CategoryController@index')->name('category.index');
    Route::get('/categories/create','CategoryController@create')->name('category.create');
    Route::post('/categories/store','CategoryController@store')->name('category.store');
    Route::get('/categories/{category}','CategoryController@show')->name('category.show');
    Route::get('/categories/{category}/edit','CategoryController@edit')->name('category.edit');
    Route::put('/categories/{category}/update','CategoryController@update')->name('category.update');

    // products
    Route::get('/products','ProductController@index')->name('products.index'); 
    Route::get('/products/create','ProductController@create')->name('products.create'); 
    Route::post('/products/store','ProductController@store')->name('products.store'); 
    Route::get('/products/{product}','ProductController@show')->name('products.show'); 
    Route::get('/products/{product}/edit','ProductController@edit')->name('products.edit');
    Route::put('/products/{product}/update','ProductController@update')->name('products.update');  
});









