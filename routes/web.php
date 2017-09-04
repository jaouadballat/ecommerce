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

Route::get('/', [
	'uses' => 'FrontEndController@index',
	'as' => 'index'
]);

Route::get('/product/{id}', [
	'uses' => 'FrontEndController@single',
	'as' => 'single'
]);

Route::post('/add/cart', [
	'uses' => 'ShoppingController@add_to_cart',
	'as' => 'cart.add'
]);

Route::get('/cart', [
	'uses' => 'ShoppingController@cart',
	'as' => 'cart'
]);

Route::get('/cart/{id}/delete', [
	'uses' => 'ShoppingController@delete',
	'as' => 'cart.delete'
]);

Route::get('/cart/{id}/inc', [
	'uses' => 'ShoppingController@inc',
	'as'  => 'cart.inc'
]);

Route::get('/cart/{id}/dec', [
	'uses' => 'ShoppingController@dec',
	'as'  => 'cart.dec'
]);

Route::get('/cart/rapid/{id}', [
	'uses' => 'ShoppingController@add_rapid',
	'as' => 'rapid'
]);

Route::get('/checkout', [
	'uses' => 'CheckoutController@index',
	'as' => 'checkout'
]);

Route::post('/checkout', [
	'uses' => 'CheckoutController@pay',
	'as' => 'pay'
]);

Route::resource('products', 'ProductsController');


Auth::routes();

Route::get('/home', 'HomeController@index');
