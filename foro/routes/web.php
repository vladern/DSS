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
});


Route::group(['prefix'=>'admin'],function()
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
});




Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
