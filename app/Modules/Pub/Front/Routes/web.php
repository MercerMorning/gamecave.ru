<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/test', function () {
   App\Jobs\SendMessage::withChain([
       new App\Jobs\PrepareJob('prepare'),
       new App\Jobs\PublishJob('publ')
   ])->dispatch('start job');
});
Route::get('/', 'FrontController@main')->name('main');
Route::get('/search', 'FrontController@search')->name('search');
Route::get('/logout', 'LogoutController@index')->name('exit');
Route::get('/games', 'FrontController@gamesList')->name('games.list');
Route::get('/game/{id}', 'FrontController@single')->name('game.single');
Route::get('/game/link/{site}/{game}/{url}', 'FrontController@link')->name('game.link');
Route::get('/game/category/{id}', 'FrontController@categoryList')->name('category.list');

//мидлвэр авторизации
Route::post('/game/comment/add/{id}', 'CommentController@add')->name('game.comment.add');

Route::get('/login', 'LoginController@create')->name('login');

Auth::routes();
Route::get('email/verify', 'Auth\VerificationController@verify')->name('verification.verify');

