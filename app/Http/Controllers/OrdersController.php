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
        $orders = \App\CustomerOrder::where('store_number', $store_number)->get();

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

		foreach ($request->get('services') as $service_id => $value) {
            $service = \App\OrderService::find($service_id);
            $service->claim_completed = true;
            $service->save();
		}

		return redirect()->route('orders.detail', $order->id);
	}
}
