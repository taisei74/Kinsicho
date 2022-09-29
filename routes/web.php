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

Route::get('/', 'ShopController@index');

Route::get('/serch', 'ShopController@serch');
Route::get('/serch/random', 'SerchController@randomshow');

Route::get('/shop', 'ShopController@show');
Route::get('/shop/show', 'SerchController@showserch');
Route::get('/shop/show/{shop}', 'ShopController@showall');