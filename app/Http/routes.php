<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin prefix
$admin_prefix = $_ENV['ADMIN_PREFIX'];

// Authentication routes...
Route::get($admin_prefix . '/auth/login', 'Admin\Auth\AuthController@getLogin');
Route::post($admin_prefix . '/auth/login', 'Admin\Auth\AuthController@postLogin');
Route::get($admin_prefix . '/auth/logout', 'Admin\Auth\AuthController@getLogout');

// Registration routes...
//    Route::get('auth/register', 'Auth\AuthController@getRegister');
//    Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => $admin_prefix, 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('product-key', 'ProductKeyController');
});
