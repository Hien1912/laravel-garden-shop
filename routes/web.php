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
 * Shop
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
 * Admin Dashboard 
 */
Route::group(['middleware' => 'auth'], function () {

    /**
     * DashboardController
     */
    Route::get("/dashboard", "DashboardController@index")->name('dashboard');

    /**
     * ProductController
     */
    Route::group(['prefix' => '/product', "as" => "product."], function () {
        Route::get('/bonsai', "ProductController@index")->name('bonsai');
        Route::get('/pots', "ProductController@index")->name('pots');
        Route::get('/accessories', "ProductController@index")->name('accessories');
    });

    /**
     * OrderController
     */
    Route::group(['prefix' => '/order', "as" => "order."], function () {
        Route::get('/pending', "OrderController@index")->name('pending');
        Route::get('/verified', "OrderController@index")->name('verified');
        Route::get('/delivery', "OrderController@index")->name('delivery');
        Route::get('/finished', "OrderController@index")->name('finished');
        Route::get('/cancelled', "OrderController@index")->name('cancelled');
    });
});

Route::group(['middleware' => ["auth", "ajax"], "prefix" => "/admin"], function () {
    /**
     * ProductController only Ajax
     */
    Route::group(["prefix" => "/product", "as" => "product."], function () {
        Route::get('/trash', "ProductController@getTrash")->name('getTrash');
        Route::get("/edit-{id}", "ProductController@findById")->name('findById');
        Route::get('/{category_id}', "ProductController@getByCategoryId")->name('getByCategoryId');
        Route::post("/", "ProductController@create")->name("create");
        Route::put("/restore-{id}", "ProductController@restore")->name('restore');
        Route::put("/update-{id}", "ProductController@update")->name('update');
        Route::delete("/delete-{id}", "ProductController@delete")->name('delete');
        Route::delete("/destroy-{id}", "ProductController@destroy")->name('destroy');
    });

    /**
     * OrderController only Ajax
     */
    Route::group(["prefix" => "/order", "as" => "order."], function () {
        Route::get("/get-{id}", "OrderController@getById")->name('findById');
        Route::get("/{status}", "OrderController@getByStatus")->name('getByStatus');
        Route::put("/update-{id}", "OrderController@update")->name('update');
    });
});
