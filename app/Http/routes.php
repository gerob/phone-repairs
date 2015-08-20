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

post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);

get('repairs/select', function () {
    return view('select-phone');
});

get('repairs/{phone-type}', 'PhoneRepairController@pricing');

post('repairs', ['as' => 'repairs.post', 'uses' => 'PhoneRepairController@postPhoneSelection']);