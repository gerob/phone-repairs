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

	// 1. SELECT A MANUFACTURER
    get('werx/order/new/manufacturer', ['as' => 'start.order', 'uses' => 'NewOrderController@getManufacturerSelection']);
    post('werx/order/new/manufacturer', ['as' => 'repairs.manufacturer', 'uses' => 'NewOrderController@postManufacturerForm']);

	// 2. COMPLETE ORDER DETAILS
	get('werx/order/new/{device}', ['as' => 'repairs.pricing', 'uses' => 'NewOrderController@getOrderDetailsForm']);
	post('werx/order/new/{device}', ['as' => 'repairs.pricing.post', 'uses' => 'NewOrderController@postOrderDetailsForm']);

	// 3. REVIEW THE ORDER
    get('werx/order/{order_id}/review/', ['as' => 'repairs.review', 'uses' => 'NewOrderController@getOrderReview']);
    post('werx/order/{order_id}/review', ['as' => 'repairs.review.post', 'uses' => 'NewOrderController@postOrderReview']);

	// 4. CONFIRM THE ORDER
    get('werx/order/{order_id}/confirm', ['as' => 'repairs.confirmation', 'uses' => 'NewOrderController@getOrderConfirm']);
    post('werx/order/{order_id}/confirm', ['as' => 'repairs.confirmation.post', 'uses' => 'NewOrderController@postOrderConfirm']);

	// JSON DEVICE SELECTION
    get('werx/api/device/{device_id}/services', ['as' => 'device.services.ajax', 'uses' => 'NewOrderController@getDeviceSelectionJson']);

	// ORDER LISTS
    get('werx/orders', ['as' => 'orders.list', 'uses' => 'OrdersController@getList']);
    get('werx/orders/store/{store_id}', ['as' => 'orders.list.store', 'uses' => 'OrdersController@getStoreList']);

	// ORDER DETAIL
	get('werx/orders/{order_id}', ['as' => 'orders.claim', 'uses' => 'OrdersController@getDetail']);

	// POST A CLAIM
	post('werx/orders/{order_id}', ['as' => 'orders.claim.post', 'uses' => 'OrdersController@postClaim']);

    // INVENTORY
    get('werx/inventory', ['as' => 'inventory.required', 'uses' => 'InventoryController@getRequiredInventory']);
    get('werx/inventory/all', ['as' => 'inventory.all', 'uses' => 'InventoryController@getAllInventory']);
    get('werx/inventory/review', ['as' => 'inventory.review', 'uses' => 'InventoryController@getReviewInventory']);
    post('werx/inventory/review', ['as' => 'inventory.review.post', 'uses' => 'InventoryController@postReviewInventory']);
	post('werx/inventory', ['as' => 'inventory.update.post', 'uses' => 'InventoryController@postUpdateInventory']);

    get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
});
