<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getList()
    {
        $orders = \App\CustomerOrder::all();

        return view('orders')->with(['orders' => $orders]);
    }

    public function getStoreList($store_id)
    {
        $orders = \App\CustomerOrder::where('store', $store_id);

        return view('store-orders')->with(['orders' => $orders]);
    }

	public function getDetail($order_id)
	{
		$order = \App\CustomerOrder::find($order_id);
		$services = $order->services()->get();

		return view('order-detail')->with(['order' => $order, 'services' => $services]);
	}



	public function postClaim(Request $request, $order_id)
	{
		$order = \App\CustomerOrder::find($order_id);
		$services = $order->services()->get();

		foreach ($services as $service) {
			if (array_key_exists($service->id, $request->get('services'))) {
				$newValue = $request->get('services')[$service->id];
				$service->claim_completed = $newValue == 'On' ? true : false;
			}
		}

		$order->save();

		return redirect()->route('orders.detail', $order->id);
	}
}
