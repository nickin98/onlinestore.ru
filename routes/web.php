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
use App\Category;

Route::get('/', 'MenuController@index')->name('index');

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->middleware('admin');

Route::get('admin/new', 'OrderController@unfinishedOrders')->name('new');

Route::get('/cart', function () {
    $categories = Category::all();
    return view('cart', ['categories' => $categories]);
});

Route::get('/order', function () {
    $categories = Category::all();
    $user = \Auth::user();
    return view('order', ['user' => $user,'categories' => $categories]);
});

Route::post('/send', 'OrderController@register')->name('send');

Route::post('/change', 'OrderController@changeStatus')->name('changeStatus');

Route::post('/login', function () {
    return 'hello';
});

Route::get('categories/{slug}', function ($slug) {
    $categories = Category::all();

    $category = Category::where('slug', '=', $slug)->first();

    if (is_null($category)) {
        // use either one of the two lines below. I prefer the second now
        // return Event::first('404');
        App::abort(404);
    }

    $products = $category->products()->paginate(8);

    return view('index', ['products' => $products, 'categories' => $categories, 'category' => $category]);
})->name('categories');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile', 'ProfileController@update')->name('profile.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/products', 'ProductController');
Route::resource('admin/categories', 'CategoryController');
Route::resource('admin/orders', 'OrderController', ['except' => [
    'create', 'store', 'update'
]]);