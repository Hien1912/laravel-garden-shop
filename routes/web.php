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


Route::get('/', 'HomeController@index');
Route::get('/paginate', 'HomeController@paginate');
Route::get("/san-pham-{id}", "HomeController@details")->name('product-details');
Route::post("/san-pham-{id}/add-{qty}", function ($id, $qty) {
    return $id;
});
Route::post("/san-pham-{id}/add-{qty}", "CartController@add")->name('add-shopping-cart');
Route::put("/san-pham-{id}/add-{qty}", "CartController@update")->name("ud-shopping-cart");

Auth::routes();

/**
 * Giỏ hàng
 */


Route::post('/dat-hang', 'CartController@store')->name('dat-hang');

Route::group(['prefix' => '/shopping-cart'], function () {
    Route::get('/', 'CartController@index')->name('get-cart');
    Route::post('/add-{id}/{qty?}', 'CartController@add')->name('add-to-cart');
    Route::put('/update-{id}/{qty?}', 'CartController@add')->name('add-to-cart');
    Route::delete('/delete-{id}', 'CartController@delete')->name('delete-product-from-cart');
});


Route::view('/home', 'shops.index')->name('home');

Route::resource('admin/product', 'ProductController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::resource('/product', 'ProductController');
    Route::resource('order', 'OrderController')->except(['create', 'store']);
});

Route::get('/{page}', 'PageController')->name('shops.page');
