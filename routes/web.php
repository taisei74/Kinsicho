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

Route::get('/', 'ShopController@top');

Route::get('/serch', 'ShopController@index');

Route::get('/serch', 'ShopController@serch');
Route::get('/serch/random', 'SerchController@randomshow');

Route::get('/shop/show/create', 'ShopController@createShow');
Route::post('/shop/show/create', 'ShopController@create');

Route::get('/shop', 'ShopController@show');
Route::get('/shop/show', 'SerchController@showserch');
Route::get('/shop/show/{shop}', 'ShopController@showall');

Route::get('/shop/show/{shop}/edit', 'ShopController@edit');
Route::put('/shop/show/{shop}', 'ShopController@update');

Route::get('/favorite' , 'ShopController@showFavorite');