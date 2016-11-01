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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/users/search', 'UserController@search');

Route::get('/users/{user}', 'UserController@get');

Route::get('/users/follow/{user}', 'UserController@follow');

Route::get('/users/unfollow/{user}', 'UserController@unfollow');

Route::get('/tweets/new', 'TweetController@newTweets');

Route::post('/tweets', 'TweetController@add');

Route::post('/tweets/{tweet}/delete', 'TweetController@delete');

Route::post('/tweets/{tweet}/retweet', 'TweetController@retweet');

Route::post('/tweets/{tweet}/comment', 'TweetController@comment');

Route::get('/tweets/{tweet}', 'TweetController@get');
