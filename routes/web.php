<?php

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false, 'verify' => false]);

Route::get('/', 'CheckCreditController@index')->name('index');
Route::post('select_year', 'CheckCreditController@select_year')->name('select_year');

//大学１年次
Route::get('/select_year/freshman/1', 'FreshmanController@freshman')->name('freshman.freshman');
Route::post('/select_year/freshman/check-college-credits', 'FreshmanController@check')->name('freshman.check');

//大学２年次
Route::get('/select_year/sophomore/1', 'SophomoreController@freshman')->name('sophomore.freshman');
Route::get('/select_year/sophomore/2', 'SophomoreController@sophomore')->name('sophomore.sophomore');
Route::post('/select_year/sophomore/check-college-credits', 'SophomoreController@check')->name('sophomore.check');

//大学３年次
Route::get('/select_year/junior/1', 'JuniorController@freshman')->name('junior.freshman');
Route::get('/select_year/junior/2', 'JuniorController@sophomore')->name('junior.sophomore');
Route::get('/select_year/junior/3', 'JuniorController@junior')->name('junior.junior');
Route::post('/select_year/junior/check-college-credits', 'JuniorController@check')->name('junior.check');

//大学４年次
Route::get('/select_year/senior/1', 'SeniorController@freshman')->name('senior.freshman');
Route::get('/select_year/senior/2', 'SeniorController@sophomore')->name('senior.sophomore');
Route::get('/select_year/senior/3', 'SeniorController@junior')->name('senior.junior');
Route::get('/select_year/senior/4', 'SeniorController@senior')->name('senior.senior');
Route::post('/select_year/senior/check-college-credits', 'SeniorController@check')->name('senior.check');

Route::group(['middleware' => ['ip']], static function () {
    Route::get('/random-sagara/login', 'Random\LoginController@showLoginForm')->name('random.login.get');
    Route::post('/random-sagara/login', 'Random\LoginController@login')->name('random.login.post');
});

Route::group(['middleware' => ['ip', 'auth']], static function () {
    Route::get('/random-sagara', 'Random\RandomController@random')->name('random.random');
});

