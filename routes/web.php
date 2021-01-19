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
Route::post('/', 'TwitterController@twitter')->name('twitter');
Route::get('/login/twitter/callback', 'TwitterController@twitterCallback');
Route::post('/login/twitter/callback', 'TwitterController@twitterCallback');
Route::get('/share', 'TwitterController@share');
Route::post('/share', 'TwitterController@share')->name('share');
// Route::post('/test', 'TestController@post')->name('post');

// jsonテスト用
Route::get('contact', 'ContactController@input'); // 入力ページ
Route::post('contact', 'ContactController@send'); // 送信ページ（Ajax）

Route::get('/', 'TopController@index')->name('index');
Route::get('/index', 'TopController@index')->name('index');
Route::get('/home', 'UsersController@home')->name('home');

//プロフィール変更
Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

//パスワード変更
Route::get('/password-edit', 'PasswordEditController@edit')->name('passwordEdit.edit');
Route::post('/password-edit', 'PasswordEditController@update')->name('passwordEdit.update');

Route::resource('post-idea', 'PostIdeasController');

// アイデア一覧表示
Route::get('ideas-list/{sort}/{page}', 'IdeasListController@showList');

// Twitter
Route::post('/', 'TwitterController@twitter')->name('twitter');
Route::get('/login/twitter/callback', 'TwitterController@twitterCallback');

// Route::post('/login/twitter/callback', 'TwitterController@twitterCallback');
// Route::get('/share', 'TwitterController@twitterLogedIn');
// Route::post('/share', 'TwitterController@share')->name('share');


// つまり"TestMailController"のsendメソッドを利用してメールを送信する
Route::get('/mail', 'TestMailController@send')->name('mail');

Auth::routes();

Route::get('/mypage', 'MypageController@index')->name('mypage');
