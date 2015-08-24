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

        $services = $order->coServices()->get();
        $checked = $request->get('services', []);

        foreach ($services as $service) {
            $work_comp = $service->work_completed;

            if (array_key_exists($service->id, $checked)) {
                $service->claim_completed = array_key_exists("'claim'", $checked[$service->id]);
                $service->work_completed = array_key_exists("'work'", $checked[$service->id]);
                $service->save();

                $inventory = \App\Inventory::firstOrNew(['store_number' => $order->store_number, 'upc' => $service->upc]);
                $inventory->count = $inventory->count + 1;
            } else {
                // Key doesn't exist so both are false
                $service->claim_completed = false;
                $service->work_completed = false;
                $service->save();
            }

            // If we have completed the work
            if ($work_comp == false && $service->work_completed == true) {
                $inventory = \App\Inventory::firstOrNew(['store_number' => $order->store_number, 'upc' => $service->upc]);
                $inventory->count = $inventory->count - 1;
            }

            // If we have unchecked the work being completed
            if ($work_comp == true && $service->work_completed == false) {
                $inventory = \App\Inventory::firstOrNew(['store_number' => $order->store_number, 'upc' => $service->upc]);
                $inventory->count = $inventory->count + 1;
            }
        }

        return redirect()->route('orders.claim', $order->id);
    }
}
