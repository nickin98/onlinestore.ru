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

Route::get('/', 'MenuController@index')->name('index');

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/order', function () {
    return view('order');
});

Route::post('/send', 'OrderController@register')->name('send');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/products', 'ProductController');
Route::resource('admin/categories', 'CategoryController');
Route::resource('admin/orders', 'OrderController', ['except' => [
    'create', 'store', 'update'
]]);