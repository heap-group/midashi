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

// サイト
Route::get('/', 'PageController@index')->middleware('auth');

// 認証が必要なページ
Route::group(['prefix' => 'post', 'middleware' => 'auth'], function () {

    // ユーザー投稿一覧
    Route::get('/', 'PostController@index')
        ->name('post_index');
    // ユーザーカテゴリー検索
    Route::get('/category/{id}', 'PostController@find')
        ->name('post_category_find');
    // ユーザー新規投稿
    Route::get('/add', 'PostController@add')
        ->name('post_add');
    Route::post('/create', 'PostController@create')
        ->name('post_create');
    // ユーザー投稿編集
    Route::get('/edit/{id}', 'PostController@edit')
        ->name('post_edit');
    Route::post('/update/{id}', 'PostController@update')
        ->name('post_update');
    // ユーザー投稿削除
    Route::get('/delete/{id}', 'PostController@delete')
        ->name('post_delete');
    Route::post('/remove', 'PostController@remove')
        ->name('post_remove');

    Route::post('/marge', 'ArticleController@marge')
        ->name('post_marge');
});

Route::group(['prefix' => 'article', 'middleware' => 'auth'], function () {

    //作成記事一覧画面
    Route::get('/', 'ArticleController@index')
        ->name('article_index');

    //作成記事詳細画面
    Route::get('/detail/{id}', 'ArticleController@show')
        ->name('article_detail');

    //作成記事削除
    Route::post('/delete/{id}', 'ArticleController@remove')
        ->name('article_delete');

    //作成記事ダウンロード
    Route::post('/export', 'ArticleController@export')
        ->name('article_export');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

/*
* Social auth
*/
Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')
    ->name('google_oauth');
Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/login/twitter', 'Auth\LoginController@redirectToTwitter')
    ->name('twitter_oauth');
Route::get('/login/twitter/callback', 'Auth\LoginController@handleTwitterCallback');
