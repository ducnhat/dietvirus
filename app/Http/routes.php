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

//Reference Controller
Route::get('ref/{id}', function($id){
    $id = $id - REF_CODE_FROM;

    $user = \App\User::findOrFail($id);

    session()->put('ref_id', $user->id);
    session()->put('ref_value', $user->ref_value);

    return Redirect::action('HomeController@index');
})->where(['id' => '[0-9]+']);

//Post Controller
Route::get('post', 'PostController@index');
Route::get('post/{id}-{slug}', 'PostController@show')
    ->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9-]+']);
Route::post('post/{id}-{slug}', 'PostController@store')
    ->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9-]+']);

//Page Controller
Route::get('page/{slug}-{id}', 'PageController@show')
    ->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9-]+']);

//Admin prefix
$admin_prefix = env('ADMIN_PREFIX');

// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => $admin_prefix, 'namespace' => 'Admin', 'middleware' => 'auth.admin', 'before' => 'admin'], function(){
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
    Route::resource('page', 'PageController');
    Route::get('/home', 'HomeController@index');
});

Route::group(['prefix' => 'member', 'namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::resource('home', 'HomeController');
    Route::resource('account', 'UserController');
    Route::resource('order', 'OrderController');
    Route::resource('warranty', 'WarrantyController');

});