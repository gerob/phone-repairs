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

get('/', function () {
    return view('login');
});

post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);

get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['middleware' => 'auth'], function () {

    get('repairs/manufacturer', 'PhoneRepairController@getManufacturerSelection');
    post('repairs/manufacturer', ['as' => 'repairs.manufacturer', 'uses' => 'PhoneRepairController@postManufacturerForm']);

    get('repairs/{manufacturer}', ['as' => 'repairs.device', 'uses' => 'PhoneRepairController@getDeviceSelection']);
    post('repairs/device', ['as' => 'repairs.device.post', 'uses' => 'PhoneRepairController@postDeviceSelection']);

    get('repairs/pricing/{device}', ['as' => 'repairs.pricing', 'uses' => 'PhoneRepairController@getPricingForm']);

    post('repairs', ['as' => 'repairs.pricing.post', 'uses' => 'PhoneRepairController@postPricingForm']);
});
