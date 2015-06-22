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

Route::get('/', 'HomeController@index');
Route::resource('cart', 'CartController');
Route::post('cart/coupon', 'CartController@coupon');
Route::post('cart/clear-coupon', 'CartController@clearCoupon');

//Admin prefix
$admin_prefix = $_ENV['ADMIN_PREFIX'];

// Authentication routes...
Route::get($admin_prefix . '/auth/login', 'Admin\Auth\AuthController@getLogin');
Route::post($admin_prefix . '/auth/login', 'Admin\Auth\AuthController@postLogin');
Route::get($admin_prefix . '/auth/logout', 'Admin\Auth\AuthController@getLogout');


Route::group(['prefix' => $admin_prefix, 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('product-key', 'ProductKeyController');
    Route::resource('coupon', 'CouponController');
    Route::get('home', array('as' => 'home', 'uses' => 'HomeController@index'));
});
