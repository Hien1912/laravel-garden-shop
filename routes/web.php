<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'HomeController@index')->name('home-page');
Route::get('/paginate', 'HomeController@paginate');
Route::get("/san-pham-{id}", "HomeController@details")->name('product-details');
Route::get('/shopping-cart', 'CartController@index')->name('shopping-cart');
Route::post("/san-pham-{id}/add-{qty}", "CartController@add")->name('add-shopping-cart');
Route::delete("/san-pham-{id}/delete", "CartController@delete")->name("del-shopping-cart");
Route::get('/dat-hang', 'CartController@order')->name('dat-hang');
Route::post('/check-out', 'CartController@store')->name('check-out');

Auth::routes();

/**
 * Giỏ hàng
 */




Route::view('/home', 'shops.index')->name('home');

Route::resource('admin/product', 'ProductController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::resource('/product', 'ProductController');
    Route::resource('order', 'OrderController')->except(['create', 'store']);
});

Route::get('/{page}', 'PageController')->name('shops.page');
