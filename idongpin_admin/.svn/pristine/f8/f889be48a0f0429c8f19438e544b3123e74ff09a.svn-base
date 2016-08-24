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

//登录
Route::group(['as' => 'auth::', 'namespace' => 'Auth'], function() {
// Authentication Routes...
    Route::get('login', 'AuthController@showLoginForm');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');

    // Registration Routes...
    Route::get('register', 'AuthController@showRegistrationForm');
    Route::post('register', 'AuthController@register');
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/home',function (){
        return view('admin/index/home');
    });

    Route::get('/',function (){
        return view('admin/index/home');
    });

    Route::group(['as'=>'company::','namespace'=>'Company'],function (){
        Route::get('company', 'CompanyController@index')->name('index');
        Route::post('company/update','CompanyController@update');
        Route::get('company/list', 'CompanyController@company_list')->name('list');
        Route::get('company/item','CompanyController@company_info')->name('item');

        Route::post('company/img/upload','CompanyAjax@img_upload');
    });

    Route::group(['as'=>'product::','namespace'=>'Product'],function (){
        Route::get('product', 'ProductController@index')->name('index');
        Route::get('product/list', 'ProductController@product_list')->name('list');
        Route::get('product/item','ProductController@product_info')->name('item');
        Route::get('product/add','ProductController@addProView')->name('add');

        Route::post('getTypes','ProductController@getTypes');
        Route::get('navigation','ProductController@product_type')->name('type');
        Route::get('navigation/list','ProductController@product_type_list')->name('typelist');

        Route::get('field','ProductController@product_field')->name('field');
        Route::get('field/list','ProductController@product_field_list')->name('fieldlist');

        Route::get('madein','ProductController@product_madein')->name('madein');
        Route::get('madein/list','ProductController@product_madein_list')->name('madeinlist');

        Route::post('product/add','ProductController@addPro');
        Route::post('product/update','ProductController@product_update');
        Route::post('inventory/update','ProductController@inventory_update');
        Route::post('navigation/update','ProductController@type_update');
        Route::post('field/update','ProductController@field_update');
        Route::post('madein/update','ProductController@madein_update');
    });

    Route::group(['as'=>'user::','namespace'=>'User'],function (){
        Route::get('user', 'UserController@index')->name('index');
        Route::get('user/list', 'UserController@user_list')->name('list');
        Route::get('user/userDetail','UserController@userDetail')->name('userDetail');
        Route::post('user/update','UserController@update');
    });

    Route::group(['as'=>'order::','namespace'=>'Order'],function (){
        Route::get('order', 'OrderController@frame')->name('frame');
        Route::get('order/index', 'OrderController@index')->name('index');
        Route::get('order/orderlist','OrderController@orderlist')->name('orderlist');
        Route::get('order/orderManage', 'OrderController@orderDetail')->name('orderDetail');
        Route::get('order/add', 'OrderController@addOrderView')->name('add');

        Route::get('order/getCompanyPro', 'OrderAjax@getCompanyPro');
        Route::get('order/getProInventory', 'OrderAjax@getProInventory');

        Route::get('launchOrder/list', 'OrderController@launchOrderManage')->name('launchOrderlist');
        Route::get('launchOrder/item', 'OrderController@launchOrderDetail')->name('launchOrderDetail');

        Route::post('launchOrder/quote','OrderAjax@quote');
        Route::post('launchOrder/update','OrderAjax@launchOrder_update');
        Route::post('order/add', 'OrderAjax@order_add');
        Route::post('order/update', 'OrderAjax@order_update');
    });
});



Route::group([ 'as' => 'api::', 'namespace' => 'Api'], function() {
    Route::get('api/v1/index', 'ApiController@index');
    Route::get('api/v1/company/info', 'ApiController@companyinfo');
});

