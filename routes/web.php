<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', function () {
    return view('store');
});
Route::get('/', function () {
    return view('store');
});


//StoreController
    Route::get('/system/logout_system','StoreController@logout_system');

    Route::post('/store/load','StoreController@load');
    
    Route::post('/store/update_cart','StoreController@update_cart');

    Route::post('/store/islogin','StoreController@islogin');

    Route::post('/store/whologin','StoreController@whologin');

    Route::post('/login_attemp','StoreController@login_attemp');
    
    Route::post('/send_sms','StoreController@send_sms');

    Route::post('/verify_sms_register','StoreController@verify_sms_register');

//checkOutController    

    Route::post('/getdata_checkout','CheckoutController@getdata_checkout');

    Route::post('/add_address_touser','CheckoutController@add_address_touser');

    
//AdminController
    //َAdd Product
    Route::get('/dashboard/add_product','AdminController@add_product');
    Route::post('/dashboard/add_productTo_system','AdminController@add_product_post');

    //Add Store 
    Route::get('/dashboard/add_store','AdminController@add_store');
    Route::post('/dashboard/add_storeTo_system','AdminController@add_storeTo_system');

    //Add Product To Store 
    Route::get('/dashboard/add_product_to_store','AdminController@add_product_to_store');
    Route::post('/dashboard/add_product_to_storeTo_system','AdminController@add_product_to_storeTo_system');