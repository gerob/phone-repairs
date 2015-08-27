<?php

namespace App\Http\Controllers;

use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getList(Request $request)
    {
        $q = $request->get('q', '');
        $store = \Auth::user()->stores()->where('default', true)->first();

        $orders = \App\CustomerOrder::where('confirmed', true)
            ->where(function ($query) use ($q) {
                $query->where('phone', 'LIKE', '%' . $q . '%')
                    ->orWhere('email', 'LIKE', '%' . $q . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $q . '%');
            })->with('coServices');

        if ($q == "") {
            $orders->where('store_number', $store->number);
        }

        return view('orders.all')->with(['orders' => $orders->get()]);
    }

    public function getStoreList($store_number)
    {
        $orders = \App\CustomerOrder::where('store_number', $store_number)->with('coServices')->get();

        return view('orders/store/all')->with(['orders' => $orders]);
    }

    public function getDetail($order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $services = $order->coServices()->get();

        $barcode = new Barcode();

        return view('orders/detail')->with(compact('order', 'services', 'barcode'));
    }

    public function postDetail(Request $request, $order_id)
    {

	    $order = \App\CustomerOrder::find($order_id);
	    $order->description = $request->get('description');
	    $order->save(); // always save the description when the page is submitted.

	    switch ($request->get('action')) {
		    case 'warranty-claim':

			    $services = $order->coServices()->get();
			    $checked = $request->get('services', []);

			    foreach ($services as $service) {
				    $work_comp = $service->work_completed;

				    if (array_key_exists($service->id, $checked)) {
					    $service->claim_completed = array_key_exists("'claim'", $checked[$service->id]);
					    $service->save();
				    } else {
					    // Key doesn't exist so both are false
					    $service->claim_completed = false;
					    $service->save();
				    }
			    }

				// setup a flash message
				// @todo: setup a flash confirmation message

				// after the page is submitted as a warranty-claim, we want to redirect to the home page
				$redirect = redirect()->route('orders.list');

			    break;
		    default:
			    break;
	    }


        return $redirect ? $redirect : redirect()->route('orders.detail', $order->id);
    }
}
