<?php

use App\User;
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

use App\Category;

Route::group(['prefix'=>'/'],function()
{
    Route::get('/',
    [
        'uses' =>'HomeController@index',
        'as' => '/'
    ]);
    Route::get('signin',
    [
        'uses' =>'UserController@show',
        'as' => 'signin'
    ]);
    Route::get('create',
    [
        'uses' =>'UserController@create',
        'as' => 'create'
    ]);
    Route::post('save',
    [
        'uses' =>'UserController@store',
        'as' => 'save'
    ]);
    Auth::routes();
    Route::get('exit',
    [
        'uses' => 'Auth\LoginController@exit',
        'as' => 'exit'
    ]);
});


Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function()
{
    Route::resource('users','UserController');
    Route::get('/',
    [
        'uses' => 'UserController@index',
        'as' => 'index'
    ]);

    Route::get('users/{id}/destroy',
    [
        'uses' => 'UserController@destroy',
        'as' => 'users.destroy'
    ]);

    Route::resource('categories','CategoryController');
    Route::get('categories/{id}/destroy',
    [
        'uses' => 'CategoryController@destroy',
        'as' => 'categories.destroy'
    ]);
   
    Route::resource('thread','ThreadController');
    Route::get('thread/{id}/destroy',
    [
        'uses' => 'ThreadController@destroy',
        'as' => 'thread.destroy'
    ]);

    Route::resource('message','MessageController');
    Route::get('message/{id}/destroy',
    [
        'uses' => 'MessageController@destroy',
        'as' => 'message.destroy'
    ]);
    
    Route::resource('upload-images','ImageController');
    Route::resource('images','ImageController');
    Route::get('images/{id}/destroy',
    [
        'uses' => 'ImageController@destroy',
        'as' => 'images.destroy'
    ]);
});


