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

Route::get('/spider','SpiderController@index');

/*首页路由*/
Route::get('/', 'IndexController@index');


/*频道路由*/
Route::get('/channel/{channel}','ChannelController@index');


/*文章路由*/
Route::get('/show/{article}', 'ArticleController@index');

/*查看图片*/
Route::get('/image/{image}','ImageController@index');


/*后台*/
Route::view('/admin','backend');