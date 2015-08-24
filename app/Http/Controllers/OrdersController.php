<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getList()
    {
        $orders = \App\CustomerOrder::where('confirmed', true)->with('coServices')->get();

        return view('orders')->with(['orders' => $orders]);
    }

    public function getStoreList($store_number)
    {
        $orders = \App\CustomerOrder::where('store_number', $store_number)->with('coServices')->get();

        return view('store-orders')->with(['orders' => $orders]);
    }

	public function getDetail($order_id)
	{
		$order = \App\CustomerOrder::find($order_id);
		$services = $order->coServices()->get();

		return view('order-detail')->with(['order' => $order, 'services' => $services]);
	}

	public function postClaim(Request $request, $order_id)
	{
		$order = \App\CustomerOrder::find($order_id);
		$order->description = $request->get('description');
		$order->save();

		$services = \App\OrderService::where('order_id', $order_id);

		foreach ($services as $service) {
			$service->claim_completed = array_key_exists($service->id, $request->get('services')) ? true : false;
			$service->save();
		}

		return redirect()->route('orders.claim', $order->id);
	}
}
