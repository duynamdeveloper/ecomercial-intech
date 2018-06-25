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
    Route::resource('attribute','AttributeController');
    Route::resource('customer','CustomerController');
    Route::resource('order','CustomerController');
    //route for ajax to manage product attribute
    Route::post('product/attribute',['as' => 'product.attribute.get','uses' => 'ProductController@getAttributes']);
    Route::post('product/attribute/add',['as' => 'product.attribute.add','uses' => 'ProductController@addAttribute']);
    Route::post('product/attribute/update',['as' => 'product.attribute.update','uses' => 'ProductController@updateAttribute']);
    Route::post('product/attribute/destroy',['as' => 'product.attribute.destroy','uses' => 'ProductController@destroyAttribute']);
    Route::post('product/attribute/get',['as' => 'product.attribute.getsingle','uses' => 'ProductController@getSingleAttribute']);
});