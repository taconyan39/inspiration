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

// テスト用ページ
// Route::get('/pagination', 'TestController@get');
// Route::get('ajax/pagination', '\Ajax\TestController@get');

// トップページ

Route::get('/', 'TopController@index')->name('index');
Route::get('/index', 'TopController@index')->name('index');
Route::get('/home', 'UsersController@home')->name('home');

//プロフィール変更
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

//パスワード変更
Route::get('password-edit', 'PasswordEditController@edit')->name('passwordEdit.edit');
Route::post('password-edit', 'PasswordEditController@update')->name('passwordEdit.update');

// アイデア詳細表示
Route::resource('post-idea', 'PostIdeasController');
Route::post('ajax/interest/{id}', 'Ajax\PostIdeasController@interest');
Route::get('ajax/interest/{id}', 'Ajax\PostIdeasController@changeInterest');

Route::post('post-idea/interest/{id}', 'PostIdeasController@interest');
Route::post('post-idea/buy/{id}', 'PostIdeasController@buy')->name('buy');

// アイデア一覧表示
Route::get('ideas-list/{category}', 'IdeasListController@index');
Route::get('ajax/ideas-list', 'Ajax\IdeasListController@index');

// レビュー投稿画面
Route::get('reviews/post-review/{id}','ReviewsController@create');
Route::post('reviews/post-review/{id}','ReviewsController@store');


Auth::routes();

Route::get('/mypage', 'MypageController@index')->name('mypage');
