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

Route::get('/', 'IndexController@index');

Route::get('/products/{product}/delete', 'ProductsController@delete');
Route::get('/products/export', 'ProductsController@export');
Route::resource('products','ProductsController');

Route::get('/transactions/purchases', 'TransactionsController@purchases');
Route::get('/transactions/sales', 'TransactionsController@sales');
Route::get('/transactions/export', 'TransactionsController@export');
Route::resource('transactions','TransactionsController', ['except' => 'show']);

Auth::routes();

Route::get('/profile', 'profileController@index')->name('profile');
