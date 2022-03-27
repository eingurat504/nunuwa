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
    Route::get('/products/categories','CategoryController@index')->name('products.categories'); 
});









