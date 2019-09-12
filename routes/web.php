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

Route::get('/coments/remove/{id}','ComentsController@remove');

Route::post('/fazerComentario/{id}','ComentsController@store');

Route::get('/posts/{id}/{id2}/{status}','PostsController@index');

Route::get('/likes/{id}/{id2}/{status}','LikesController@index');

Route::resource('notifications', 'NotificationController');