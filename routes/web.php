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

Route::get('/', function () {
    return view('frontend.home.index');
});
Route::get('/shop', function () {
    return view('frontend.shop.index');
});
Route::get('/product', function () {
    return view('frontend.product.index');
});
Route::get('/cart', function(){
    return view('frontend.cart.index');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'be.',
    'namespace' => 'backend',
    'middleware' => ['web'],
], function(){
    Route::resource('category','CategoryController');
    Route::resource('manufacture','ManufactureController');
    Route::resource('product','ProductController');
});