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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/**
 * User
 */
Route::group(['prefix' => '/'], function () {
    Route::get('', 'ShopController@index')->name('home-page');
    Route::get('/paginate', 'ShopController@paginate')->middleware('ajax')->name('paginate');
    Route::get("/san-pham-{id}", "ShopController@details")->name('product-details');
    Route::get('/shopping-cart', 'CartController@index')->name('shopping-cart');
    Route::post("/san-pham-{id}/add-{qty}", "CartController@add")->name('add-shopping-cart')->middleware('ajax');
    Route::delete("/san-pham-{id}/delete", "CartController@delete")->name("del-shopping-cart")->middleware('ajax');
    Route::post('/check-out', 'CartController@store')->name('check-out')->middleware('ajax');
    Route::get('/about', 'ShopController@about')->name('about');
    Route::get('/contact', 'ShopController@contact')->name('contact');
});


/**
 * Admin
 */
// Route::group(['middleware' => 'auth'], function () {
    // Route::get("/dashboard", "DashboardController@index")->name('dashboard');
    Route::get('/san-pham/{category_id}', "ProductController@index")->name('san-pham');
    // Route::get('/don-hang/{status}', "OrderController@index")->name('don-hang');

    // Route::group(['middleware' => 'ajax', "prefix" => "/ajax"], function () {
    //     Route::group(['prefix' => '/product', "as" => "product."], function () {
    //         Route::get('/{category_id}', "ProductController@getByCategoryId")->name('getByCategoryId');
    //         Route::get("/find-{id}", "ProductController@findById")->name('findById');
    //         Route::post("/", "ProductController@create")->name(".create");
    //         Route::put("/restore-{id}", "ProductController@restore")->name('restore');
    //         Route::put("/update-{id}", "ProductController@update")->name('update');
    //         Route::delete("/delete-{id}", "ProductController@delete")->name('delete');
    //         Route::delete("/destroy-{id}", "ProductController@destroy")->name('destroy');
    //     });

    //     Route::group(['prefix' => '/order', "as" => "order."], function () {
    //         Route::get("/{status}", "OrderController@getByStatus")->name('getByStatus');
    //         Route::get("/find-{id}", "OrderController@getById")->name('findById');
    //         Route::post("/", "OrderController@create")->name("create");
    //         Route::put("/update-{id}", "OrderController@update")->name('update');
    //     });
    // });
// });
