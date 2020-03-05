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

Route::get('/profile/id={id}','ProfileController@show')     ->name('profile.show');

Route::get('/search'        ,'OpenThreadController@searchThread') ->name('thread.search');
Route::get('/recently'      ,'OpenThreadController@recentThreads')->name('thread.recently');
Route::get('/topThreads'    ,'OpenThreadController@topThreads')   ->name('thread.top');
Route::get('/thread/id={id}','OpenThreadController@didLand')      ->name('thread.show');

Auth::routes();

Route::get ('/home', 'HomeController@index')            ->name('home'); 
Route::post('/updateIcon', 'HomeController@updateIcon') ->name('update.icon');

Route::post  ('/createThread' , 'OpenThreadController@createThread');
Route::post  ('/createPost'   , 'OpenThreadController@createPost');
Route::delete('/deleteThread' , 'OpenThreadController@deleteThread') ->name('thread.delete');
Route::put   ('/restoreThread', 'OpenThreadController@restoreThread')->name('thread.restore');
Route::put   ('/editThread'   , 'OpenThreadController@editThread')   ->name('thread.edit');
