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

Route::get('/', 'IdeasController@index')->name('index');
Route::get('/index', 'IdeasController@index')->name('index');
Route::get('/home', 'UsersController@home')->name('home');
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/test', 'TestController@test');

// つまり"TestMailController"のsendメソッドを利用してメールを送信する
Route::get('/mail', 'TestMailController@send')->name('mail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
