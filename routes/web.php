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
// Authentication Routes
// Route::get('auth/login', 'Auth\LoginController@getLogin');
// Route::post('auth/login', 'Auth\LoginController@postLogin');
// Route::get('auth/logout', 'Auth\LoginController@getLogout');

// // Registration Routes
// Route::get('auth/register', 'Auth\RegisterController@getRegister');
// Route::post('auth/register', 'Auth\RegisterController@postRegister');


Route::get('blog/{slug}',['as'=>'blog.single', 'uses' => 
'BlogController@getSingle']);
Route::get('blog',['uses' => 'BlogController@getIndex', 'as' =>'blog.index']);
Route::get('/contact', 'PagesController@getContact');
Route::get('/about', 'PagesController@getAbout');
Route::get('/','PagesController@getIndex');
Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController',['except'=> ['create']]);

//Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('logout', 'Auth\LoginController@logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
