<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','LandingPageController@didLand');
Route::get('/thread/id={id}','OpenThreadController@didLand')->name('thread.show');
Route::get('/profile/id={id}','ProfileController@show')->name('profile.show');
Route::get('/search','OpenThreadController@searchThread')->name('thread.search');
Route::get('/recently','OpenThreadController@recentThreads')->name('thread.recently');
Route::get('/topThreads','OpenThreadController@topThreads')->name('thread.top');
Route::post('/createThread', 'OpenThreadController@createThread');
Route::post('/createPost', 'OpenThreadController@createPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
