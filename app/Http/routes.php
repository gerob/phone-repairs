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
    return redirect()->route('orders.list');
});

get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
post('login', ['as' => 'login.post', 'uses' => 'Auth\AuthController@postLogin']);

Route::group(['middleware' => 'auth'], function () {

    get('werx/repairs/manufacturer', ['as' => 'start.order', 'uses' => 'PhoneRepairController@getManufacturerSelection']);
    post('werx/repairs/manufacturer', ['as' => 'repairs.manufacturer', 'uses' => 'PhoneRepairController@postManufacturerForm']);

    get('werx/repairs/review/{order_id}', ['as' => 'repairs.review', 'uses' => 'PhoneRepairController@getReviewOrder']);
    post('werx/repairs/review', ['as' => 'repairs.review.post', 'uses' => 'PhoneRepairController@postReviewOrder']);

    get('werx/repairs/confirmation/{order_id}', ['as' => 'repairs.confirmation', 'uses' => 'PhoneRepairController@getConfirmRepairs']);
    get('werx/repairs/finish', ['as' => 'repairs.finish', 'uses' => 'PhoneRepairController@postFinishOrder']);

    get('werx/repairs/{manufacturer}', ['as' => 'repairs.device', 'uses' => 'PhoneRepairController@getDeviceSelection']);
    post('werx/repairs/device', ['as' => 'repairs.device.post', 'uses' => 'PhoneRepairController@postDeviceSelection']);

    get('werx/repairs/pricing/{device}', ['as' => 'repairs.pricing', 'uses' => 'PhoneRepairController@getPricingForm']);

    post('werx/repairs', ['as' => 'repairs.pricing.post', 'uses' => 'PhoneRepairController@postPricingForm']);

	// ORDER LISTS
    get('werx/orders', ['as' => 'orders.list', 'uses' => 'OrdersController@getList']);
    get('werx/orders/store/{store_id}', ['as' => 'orders.list.store', 'uses' => 'OrdersController@getStoreList']);

	// CLAIMS
	post('werx/orders/{order_id}', ['as' => 'orders.claim.post', 'uses' => 'OrdersController@postClaim']);
	get('werx/orders/{order_id}', ['as' => 'orders.claim', 'uses' => 'OrdersController@getDetail']);
    post('werx/orders/{order_id}/completed/{service_id}', ['as' => 'orders.work-completed', 'uses' => 'OrdersController@getDetail']);

    get('werx/inventory', ['as' => 'inventory.required', 'uses' => 'InventoryController@getRequiredInventory']);
    get('werx/inventory/all', ['as' => 'inventory.all', 'uses' => 'InventoryController@getAllInventory']);
    get('werx/inventory/review', ['as' => 'inventory.review', 'uses' => 'InventoryController@getReviewInventory']);
    post('werx/inventory/review', ['as' => 'inventory.review.post', 'uses' => 'InventoryController@postReviewInventory']);
	post('werx/inventory', ['as' => 'inventory.update.post', 'uses' => 'InventoryController@postUpdateInventory']);

    get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
});
