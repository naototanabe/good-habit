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

Route::get('/', 'HabitsController@index');


Route::group(['middleware' => ['auth']], function () {
    // 中略
    Route::resource('habits', 'HabitsController', ['only' => ['create', 'store', 'destroy', 'edit', 'update']]);
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show', 'destroy']]); //destroy追加
    Route::get('users','UsersController@delete_confirm')->name('users.delete_confirm');
});


//ユーザ登録
Route::get('signup','Auth\RegisterController@showRegistrationform')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('clears', 'UsersController@clears')->name('users.clears');  
    });


// 追加
    Route::group(['prefix' => 'habits/{id}'], function () {
        Route::post('clear', 'ClearsController@store')->name('clears.clear');
        Route::delete('unclear', 'ClearsController@destroy')->name('clears.unclear');
    });
});