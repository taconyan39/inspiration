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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'TestController@get');
Route::get('/test', 'TestController@get')->name('test');
Route::post('/test', 'TestController@twitter')->name('twitter');
Route::post('/test', 'TestController@post');

Route::get('/axios', 'TestController@axios');


Route::get('/', 'TopController@index')->name('index');
Route::get('/index', 'TopController@index')->name('index');
Route::get('/home', 'UsersController@home')->name('home');
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');
Route::resource('post-idea', 'PostIdeasController');


// つまり"TestMailController"のsendメソッドを利用してメールを送信する
Route::get('/mail', 'TestMailController@send')->name('mail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
