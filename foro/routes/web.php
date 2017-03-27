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


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

Route::get('/', 'UserController@index');
Route::post('store', 'UserController@createUser');

Route::get('register', 'UserController@create');

Route::get('editprofile', 'UserController@edit');

Route::get('signin', 'UserController@signin');

//Route::get('editprofile', function () {
//  return view('editprofile');
//});

//Route::get('admin', function () {
    //return view('admin', array ('categorias' => Category::getCategories()));
//});

Route::group(['prefix'=>'/'],function()
{
   Route::resource('users','UserController');
});

Route::get('users/{id}/destroy',
[
    'uses' => 'UserController@destroy',
    'as' => 'users.destroy'
]);

Route::get('users/signin',
[
    'uses' => 'UserController@signin',
    'as' => 'users.signin'
]);


Route::group(['prefix'=>'/'],function()
{
   Route::resource('categories','CategoryController');
});

Route::get('categories/{id}/destroy',
[
    'uses' => 'CategoryController@destroy',
    'as' => 'categories.destroy'
]);


