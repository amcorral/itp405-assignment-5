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


Route::get('/', 'twitterController@main');
Route::post('/newTweet', 'twitterController@store');
Route::get('/tweets/{id}/delete', 'twitterController@destroy');
Route::get('/tweets/{id}', 'twitterController@view');

Route::get('/tweets/{id}/edit', 'twitterController@edit');
Route::post('/tweets/{id}', 'twitterController@update');
