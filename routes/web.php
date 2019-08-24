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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'MenuController@index')->name('menu');


// Route::post('admin/products/change/{product}', 'ProductController@change')->name('products.change');

Route::resource('admin/products', 'ProductController');
