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

#na dole najkrótszy url u góry najdłuzszy
Route::get('/contact', 'PagesController@getContact');
Route::get('/about', 'PagesController@getAbout');
Route::get('/','PagesController@getIndex');
Route::resource('posts', 'PostController');


