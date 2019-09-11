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
    return view('welcome');
});


Auth::routes();


Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');


Route::get('/posts','PostsController@index');

Route::get('/posts/create','PostsController@create');

Route::post('/posts','PostsController@store');

Route::get('/coments','ComentsController@index');

Route::get('/coments/create','ComentsController@create');

Route::get('/coments/remove','ComentsController@remove');

Route::post('/coments','ComentsController@store');


Route::resource('notifications', 'NotificationController');