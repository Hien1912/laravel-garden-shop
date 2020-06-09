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

Auth::routes();

/**
 * Giỏ hàng
 */


Route::post('/dat-hang', 'CartController@store')->name('dat-hang');

Route::view('/gio-hang', 'shops.cart');
Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index')->name('get-cart');
    Route::post('/', 'CartController@add')->name('add-to-cart');
    Route::patch('/', 'CartController@update')->name('update-cart');
    Route::delete('/{id}', 'CartController@delete')->name('delete-product-from-cart');
});

Route::get('/san-pham/{id}', function ($id) {
    return view('shops.product')->withProduct(App\Product::find($id));
})->name('san-pham');


Route::view('gio-hang', 'shops.cart');

Route::view('/home', 'shops.index')->name('home');

Route::resource('admin/product', 'ProductController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::view('/dashboard', 'admin.dashboard');
    Route::resource('/product', 'ProductController');
    Route::resource('order', 'OrderController')->except(['create', 'store']);
});

Route::get('/{page}', 'PageController')->name('shops.page');
