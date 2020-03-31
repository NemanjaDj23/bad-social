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

Route::get('/posts', 'PostsController@index')->name('posts.index');
Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit')->middleware('can:update,post');
Route::patch('/posts/{post}', 'PostsController@update')->name('posts.update')->middleware('can:update,post');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy')->middleware('can:delete,post');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit')->middleware('can:update,user');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update')->middleware('can:update,user');

Route::post('/comment/store', 'CommentsController@store')->name('comment.store');
