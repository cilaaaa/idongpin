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
//登录注册
Route::group(['as' => 'auth::', 'namespace' => 'Auth'], function() {
// Authentication Routes...
    Route::get('login', 'AuthController@showLoginForm');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');

// Registration Routes...
    Route::get('register', 'AuthController@showRegistrationForm');
    Route::post('register', 'AuthController@register');
    Route::post('/getRegisterCode','AuthController@getCode');

// Password Reset Routes...
    Route::get('password/reset', 'PasswordController@showResetView');
    Route::post('/getResetCode','PasswordController@getResetCode');
    Route::post('password/reset','PasswordController@reset');

    Route::post('/getCompanyInfo','AuthController@getCompanyInfo');
});


//首页
Route::group(['as' => 'home::', 'namespace' => 'Home'], function() {
    Route::get('/', 'HomeController@index')->name('index');
});

//用户管理
Route::group(['middleware' => 'auth', 'as' => 'user::', 'namespace' => 'User'], function() {
    Route::get('/user', 'UserController@index')->name('index');
    Route::get('/user/info', 'UserController@userinfo');
    Route::get('/user/auth', 'UserController@auth');
    Route::get('/user/address', 'UserController@address');
    Route::get('/user/order', 'UserController@order');
    Route::get('/user/myLaunch', 'UserController@launch_order');


    Route::get('/user/getQuote', 'UserAjax@getQuote');
    Route::get('/user/getLaunchOrder', 'UserAjax@getLaunchOrderDetail');
    Route::get('/user/getOrder','UserAjax@getOrder');

    Route::post('/user/launchOrder/update','UserAjax@launchOrder_update');
    Route::post('/user/makeOrder','UserAjax@makeOrder');
    Route::post('/user/order/update','UserAjax@order_update');
    Route::post('/user/address/add','UserAjax@address_add');
});

//产品管理
Route::group([ 'as' => 'product::', 'namespace' => 'Product'], function() {
    Route::get('/search','ProductController@search')->name('search');
    Route::get('/product/item',['middleware' => 'pro','uses' => 'ProductController@getProduct'])->name('item');
    Route::group(['middleware' => 'company'],function (){
        Route::get('/company','ProductController@company')->name('company');
        Route::get('/company/introduce','ProductController@companyIntroduce')->name('introduce');
        Route::get('/company/supply','ProductController@companySupply')->name('supply');
        Route::get('/company/contact','ProductController@companyContact')->name('contact');
        Route::get('/company/search','ProductController@companySupply')->name('search');
    });
});

//团购管理
Route::group([ 'as' => 'groupbuy::', 'namespace' => 'Groupbuy'], function() {
    Route::get('/groupbuy','GroupbuyController@index')->name('index');
});

//找订单管理
Route::group([ 'as' => 'findorder::', 'namespace' => 'Findorder'], function() {
    Route::get('/findorder','FindorderController@index')->name('index');

    Route::post('/launchOrder','FindorderController@launchOrder');
});

//订单管理
Route::group([ 'as' => 'order::', 'namespace' => 'Order'], function() {

});

