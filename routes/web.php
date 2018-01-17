<?php

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

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/{id}', 'ProductController@show')->name('show_product');

Route::post('/products/get_sku', 'SkuController@getByAttributes')->name('get_by_attributes');
