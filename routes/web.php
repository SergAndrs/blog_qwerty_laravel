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

/* Post routes */
Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create')->name('posts.create');
Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
Route::put('/posts/{post}', 'PostsController@update')->name('posts.update');
Route::post('/posts/{post}', 'PostsController@destroy')->name('posts.destroy');

/* 'Likes' routes */
Route::post('/posts/{post}/like', 'LikesController@store');
Route::post('/posts/{post}/unlike', 'LikesController@destroy');

/* Registrations routes */
Route::get('/register', 'RegistrationController@create')->name('register.create');
Route::post('/register', 'RegistrationController@store')->name('register.store');

/* 'Log in', 'Log out' routes */
Route::get('/login', 'SessionsController@create')->name('login.create');
Route::post('/login', 'SessionsController@store')->name('login.store');
Route::get('/logout', 'SessionsController@destroy')->name('login.destroy');