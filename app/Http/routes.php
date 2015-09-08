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

get('/werx', function () {
	return redirect()->route('orders.list');
});

get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
post('login', ['as' => 'login.post', 'uses' => 'Auth\AuthController@postLogin']);

Route::group(['middleware' => 'auth'], function () {

	// 1. SELECT A MANUFACTURER
    get('werx/order/new/manufacturer', ['as' => 'order.new.manufacturer', 'uses' => 'NewOrderController@getManufacturerSelection']);
    post('werx/order/new/manufacturer', ['as' => 'order.new.manufacturer.post', 'uses' => 'NewOrderController@postManufacturerForm']);

	// 2. COMPLETE ORDER DETAILS
	get('werx/order/new/{device}', ['as' => 'order.new.details', 'uses' => 'NewOrderController@getOrderDetailsForm']);
	post('werx/order/new/{device}', ['as' => 'order.new.details.post', 'uses' => 'NewOrderController@postOrderDetailsForm']);

	// 3. REVIEW THE ORDER
    get('werx/order/{order_id}/review/', ['as' => 'order.new.review', 'uses' => 'NewOrderController@getOrderReview']);
    post('werx/order/{order_id}/review', ['as' => 'order.new.review.post', 'uses' => 'NewOrderController@postOrderReview']);

	// 4. CONFIRM THE ORDER
    get('werx/order/{order_id}/confirm', ['as' => 'order.new.confirm', 'uses' => 'NewOrderController@getOrderConfirm']);
    post('werx/order/{order_id}/confirm', ['as' => 'order.new.confirm.post', 'uses' => 'NewOrderController@postOrderConfirm']);

	// JSON DEVICE SELECTION
    get('werx/api/device/{device_id}/services', ['as' => 'api.device.services', 'uses' => 'NewOrderController@getDeviceSelectionJson']);

	// ORDER LISTS
    get('werx/orders', ['as' => 'orders.list', 'uses' => 'OrdersController@getCurrentStoreOrders']);
	get('werx/orders/all', ['as' => 'orders.list.all', 'uses' => 'OrdersController@getAllOrders']);
    get('werx/orders/store/{store_id}', ['as' => 'orders.list.store', 'uses' => 'OrdersController@getStoreList']);

	// ORDER DETAIL
	get('werx/orders/{order_id}', ['as' => 'orders.detail', 'uses' => 'OrdersController@getDetail']);
	post('werx/orders/{order_id}', ['as' => 'orders.detail.post', 'uses' => 'OrdersController@postDetail']);

    // INVENTORY
    get('werx/inventory', ['as' => 'inventory.required', 'uses' => 'InventoryController@getRequiredInventory']);
    get('werx/secret-inventory', ['as' => 'inventory.werx', 'uses' => 'InventoryController@getWerxInventory']);
    get('werx/inventory/all', ['as' => 'inventory.all', 'uses' => 'InventoryController@getAllInventory']);
    get('werx/inventory/review', ['as' => 'inventory.review', 'uses' => 'InventoryController@getReviewInventory']);
    post('werx/inventory/review', ['as' => 'inventory.review.post', 'uses' => 'InventoryController@postReviewInventory']);
	post('werx/inventory', ['as' => 'inventory.update.post', 'uses' => 'InventoryController@postUpdateInventory']);

    // ADMIN USERS
    get('werx/admin/users', ['as' => 'users.all', 'uses' => 'UsersController@index']);
    get('werx/admin/users/new', ['as' => 'users.new', 'uses' => 'UsersController@create']);
    post('werx/admin/users/new', ['as' => 'users.new.post', 'uses' => 'UsersController@store']);
    get('werx/admin/users/edit/{user_id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    post('werx/admin/users/edit/{user_id}', ['as' => 'users.edit.post', 'uses' => 'UsersController@update']);

    get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
});
