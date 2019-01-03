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

// Route::get('/home', function(){
//     return view('home');
// });

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/logout', 'Auth\LoginController@logout');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:web', 'as' => 'tweet.'], function () {
    Route::get('/home', 'TweetController@show')->name('show');
    Route::post('/home', 'TweetController@add');
    Route::post('/home/delete', 'TweetController@delete');
    Route::post('/home/edit/{id}', 'TweetController@edit');
    Route::post('/home/update', 'TweetController@update');
});
