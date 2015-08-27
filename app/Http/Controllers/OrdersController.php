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

        // todo handle the search query.

        $orders = \App\CustomerOrder::where('confirmed', true)
            ->where(function ($query) use ($q) {
                $query->where('phone', 'LIKE', '%' . $q . '%')
                    ->orWhere('email', 'LIKE', '%' . $q . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $q . '%');
            })->with('coServices')->get();

        return view('orders/all')->with(['orders' => $orders]);
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
        $order->save();

        $services = $order->coServices()->get();
        $checked = $request->get('services', []);

        foreach ($services as $service) {
            $work_comp = $service->work_completed;

            if (array_key_exists($service->id, $checked)) {
                $service->claim_completed = array_key_exists("'claim'", $checked[$service->id]);
                $service->work_completed = array_key_exists("'work'", $checked[$service->id]);
                $service->save();
            } else {
                // Key doesn't exist so both are false
                $service->claim_completed = false;
                $service->work_completed = false;
                $service->save();
            }

            // If we have completed the work
            if ($work_comp == false && $service->work_completed == true) {
                $inventory = \App\Inventory::firstOrNew(['store_number' => $order->store_number, 'upc' => $service->upc]);
                $inventory->count = $inventory->count += 1;
                $inventory->save();
            }

            // If we have unchecked the work being completed
            if ($work_comp == true && $service->work_completed == false) {
                $inventory = \App\Inventory::firstOrNew(['store_number' => $order->store_number, 'upc' => $service->upc]);
                $inventory->count = $inventory->count -= 1;
                $inventory->save();
            }
        }

        return redirect()->route('orders.detail', $order->id);
    }
}
