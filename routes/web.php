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

Route::post('/index', 'PostController@store');
Route::get('/index', 'PostController@create')->name('posts.create');
Route::get('/index', 'ProfileController@index')->name('profiles.index');

Route::get('/profile/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profiles.update');

Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');

Route::post('/comment/store', 'CommentController@store')->name('comment.store');
