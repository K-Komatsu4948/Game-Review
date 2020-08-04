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

Route::get('/', 'GamesController@index')->name('top.get');


Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');

Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('login', 'Auth\LoginController@login')->name('login.post');

Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'rankingus/{id}'], function () {
        Route::get('weekly', 'RankingusController@weekly')->name('weekly_rankingus');
        Route::get('monthly', 'RankingusController@monthly')->name('monthly_rankingus');
        Route::get('yearly', 'RankingusController@yearly')->name('yearly_rankingus');
    });
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::resource('games', 'GamesController', ['only' => ['store', 'destroy']]);
    
    Route::resource('reviews', 'ReviewsController', ['only' => ['index', 'store', 'destroy']]);
    
    Route::get('games/register', 'GameregistersController@index')->name('gameregister.get');
    Route::post('games/register', 'GameregistersController@store')->name('gameregister.post');
    

    Route::get('games/search', 'GamesearchsController@index')->name('search.get');

    Route::get('myreviews/{user}', 'MyreviewsController@index')->name('reviews.get');
    
    Route::get('games/{game}', 'ReviewsController@create')->name('reviews.create');
    
    Route::get('rankingus', 'RankingusController@weekly')->name('rankingu.get');
    
    Route::get('rankingus/month', 'MonthlyrankingusController@monthly')->name('monthly.get');
    
    Route::get('rankingus/year', 'YearlyrankingusController@yearly')->name('yearly.get');
});