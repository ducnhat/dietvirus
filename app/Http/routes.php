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

//Homepage
Route::get('/', 'HomeController@index');

//Cart Controller
Route::resource('cart', 'CartController');
Route::get('cart/review', 'CartController@show');
Route::post('cart/coupon', 'CartController@coupon');
Route::post('cart/clear-coupon', 'CartController@clearCoupon');
Route::post('cart/remove-items', 'CartController@removeItem');

//Confirm Order
Route::get('checkout/confirm/{id}', 'CheckoutController@confirm');
Route::get('checkout/test/{id}', 'CheckoutController@test');

//Order Controller
Route::resource('order', 'OrderController');

//Key Controller
Route::get('warranty', 'KeyController@warranty');
Route::resource('key', 'KeyController');

//Contact Controller
Route::resource('contact', 'ContactController');

//Post Controller
Route::get('post', 'PostController@index');
Route::get('post/{id}-{slug}', 'PostController@show')
    ->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9-]+']);
Route::post('post/{id}-{slug}', 'PostController@store')
    ->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9-]+']);

//Admin prefix
$admin_prefix = env('ADMIN_PREFIX');

// Authentication routes...
Route::get($admin_prefix . '/auth/login', 'Admin\Auth\AuthController@getLogin');
Route::post($admin_prefix . '/auth/login', 'Admin\Auth\AuthController@postLogin');
Route::get($admin_prefix . '/auth/logout', 'Admin\Auth\AuthController@getLogout');


Route::group(['prefix' => $admin_prefix, 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('product-key', 'ProductKeyController');
    Route::resource('coupon', 'CouponController');
    Route::resource('order', 'OrderController');
    Route::resource('warranty', 'WarrantyController');
    Route::resource('contact', 'ContactController');
    Route::resource('post-category', 'PostCategoryController');
    Route::resource('post', 'PostController');
    Route::resource('post-comment', 'PostCommentController');
    Route::get('home', array('as' => 'home', 'uses' => 'HomeController@index'));
});
