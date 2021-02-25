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
Route::get('/test', 'TestController@get');
Route::post('/test', 'TestController@post');
// Route::get('ajax/pagination', '\Ajax\TestController@get');

Route::group(['middleware' => ['auth']], function () {
  Route::resource('post-idea', 'PostIdeasController');
  Route::get('myideas-list', 'IdeasListController@myidea')->name('myideas-list');
  Route::get('interests-list', 'IdeasListController@interest')->name('interest-ideas-list');
  Route::get('buy-ideas-list', 'IdeasListController@buyIdeas')->name('buy-ideas-list');
  Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
  Route::get('password-edit', 'PasswordEditController@edit')->name('passwordEdit.edit');
  //商品購入
  Route::post('post-idea/buy/{id}', 'ShowIdeaController@buy')->name('buy');
});


// トップページ

Route::get('/', 'TopController@index')->name('index');
Route::get('/index', 'TopController@index')->name('index');
Route::get('/home', 'UsersController@home')->name('home');

// アイデア詳細表示
// Route::resource('post-idea', 'PostIdeasController')->middleware('auth');
Route::get('idea/{id}', 'ShowIdeaController@show');
Route::post('ajax/interest/{id}', 'Ajax\PostIdeasController@interest');
Route::get('ajax/interest/{id}', 'Ajax\PostIdeasController@changeInterest');
// Route::get('ajax/idea-edit/{id}','Ajax\PostIdeasController@editAjax');
Route::get('ajax/idea-edit/{id}','Ajax\PostIdeasController@editAjax');
// Route::post('delete/{id}', 'PostIdeascontroller@delete');

Route::post('post-idea/interest/{id}', 'PostIdeasController@interest');

// カテゴリー取得
// Route::get('/ajax/categories', 'Ajax\CategoriesController@category');

// ユーザー情報取得
// Route::get('/ajax/user', 'Ajax\UserController@user');

//口コミ投稿
Route::get('ajax/reviews/{id}','Ajax\ReviewsController@show');
// Route::post('reviews/post-review/{id}', 'ReviewsController@store');

// アイデア一覧表示
Route::get('all-ideas-list', 'IdeasListController@index')->name('all-ideas-list');
Route::get('ajax/ideas-list', 'Ajax\IdeasListController@index');
Route::get('reviews-list', 'ReviewsController@index');
Route::post('all-ideas-list', 'IdeasListController@search');
Route::post('ajax/ideas-list', 'Ajax\IdeasListController@post');
Route::get('myidea-reviews', 'ReviewsController@toMeReviews');

// Route::get('myideas-list', 'IdeasListController@myidea');
// Route::get('interests-list', 'IdeasListController@interest');
Route::post('interests-list', 'IdeasListController@interestRemove');

//プロフィール変更
// Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

//パスワード変更
// Route::get('password-edit', 'PasswordEditController@edit')->name('passwordEdit.edit');
Route::post('password-edit', 'PasswordEditController@update')->name('passwordEdit.update');


// 口コミ投稿画面
Route::post('reviews/{id}','ReviewsController@postreview');


Auth::routes();

Route::get('/mypage', 'MypageController@index')->name('mypage');
