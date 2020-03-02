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

Route::post('/index', 'PostsController@store');
Route::get('/index', 'PostsController@create')->name('posts.create');
Route::get('/index', 'ProfilesController@index')->name('profiles.index');
Route::get('/profile/{user}', 'ProfilesController@show')->name('profiles.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
//Route::get('/profile/{user}', 'ProfilesController@update')->name('profiles.update');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
