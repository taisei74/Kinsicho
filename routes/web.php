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

Route::get('/shop/show/create', 'ShopController@createShow')->middleware('auth');
Route::post('/shop/show/create', 'ShopController@create')->middleware('auth');

Route::get('/shop', 'ShopController@show');
Route::get('/shop/show', 'SerchController@showserch');
Route::get('/shop/show/{shop}', 'ShopController@showall');

Route::get('/shop/show/{shop}/edit', 'ShopController@edit');
Route::put('/shop/show/{shop}', 'ShopController@update');
Route::delete('/shop/show/{shop}', 'ShopController@destory');

Route::get('/favorite' , 'LikeController@showFavorite');
Route::get('/favorite/plan', 'PlanController@plan');
Route::post('/favorite/plan', 'PlanController@createPlan');
Route::get('/favorite/plan/index', 'PlanController@index');
Route::get('/favorite/plan/{plan}', 'PlanController@show');
Route::delete('/favorite/plan/{plan}', 'PlanController@delete');


Route::get('/reply/like/{shop}', 'LikeController@like')->name('like');
Route::get('/reply/unlike/{shop}', 'LikeController@unlike')->name('unlike');
Route::get('/plan/like/{plan}', 'LikeController@plan_like')->name('plan_like');
Route::get('/plan/unlike/{plan}', 'LikeController@plan_unlike')->name('plan_unlike');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
