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

// Route::get('admin/login', function(){
//     ddd('testing.......');
// });

// Route::get('admin/login','Auth\AuthController@getLogin')->name('adminLogin');
// Route::post('admin/login', 'Auth\AuthController@postLogin')->name('adminLoginPost');
// Route::get('admin/logout', 'Auth\AuthController@logout')->name('adminLogout');

// Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
//     // Admin Dashboard
//     Route::get('dashboard','AuthController@dashboard')->name('dashboard'); 
// });









