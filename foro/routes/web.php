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

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    
    Route::resource('categories','CategoryController');
    Route::resource('message','MessageController');
    Route::resource('upload-images','ImageController');
    Route::resource('images','ImageController');
    Route::get('users/{id}/memeberData',[
            'uses' => 'UserController@memeber',
            'as' => 'users.memberData'
    ]);
    Route::get('thread/newThread',[
        'uses' =>'ThreadController@createByMemeber',
        'as'=>'thread.newThread'
    ]);
        Route::post('storeThread',[
        'uses' =>'ThreadController@storeByMember',
        'as'=>'thread.storedByMember'
    ]);
    Route::resource('thread','ThreadController');
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

    
    Route::get('categories/{id}/destroy',
    [
        'uses' => 'CategoryController@destroy',
        'as' => 'categories.destroy'
    ]);
   
    
    Route::get('thread/{id}/destroy',
    [
        'uses' => 'ThreadController@destroy',
        'as' => 'thread.destroy'
    ]);

    
    Route::get('message/{id}/destroy',
    [
        'uses' => 'MessageController@destroy',
        'as' => 'message.destroy'
    ]);
    
    
    Route::get('images/{id}/destroy',
    [
        'uses' => 'ImageController@destroy',
        'as' => 'images.destroy'
    ]);
});

    Route::get('/admin/tabCategories', 'CategoryController@frame');
    Route::get('/admin/tabUser', 'UserController@frame');
    Route::get('/admin/threads/index', 'ThreadController@frame');
    Route::get('/admin/messages/tabMessages', 'MessageController@frame');

