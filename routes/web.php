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
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::post('/posts/update/{post}', 'PostsController@update');
Route::post('/posts/destroy/{post}', 'PostsController@destroy');

/* 'Likes' routes */
Route::post('/posts/{post}/like', 'LikesController@store');
Route::post('/posts/{post}/unlike', 'LikesController@destroy');

/* Registrations routes */
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

/* 'Log in', 'Log out' routes */
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');