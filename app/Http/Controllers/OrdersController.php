<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getList()
    {
        $orders = \App\CustomerOrder::where('confirmed', true)->with('services')->get();

        foreach ($orders as $order) {
            dd($order->services->get());
            foreach ($order->services as $service) {
                dd($service);
            }
        }
        return view('orders')->with(['orders' => $orders]);
    }

    public function getStoreList($store_number)
    {
        $orders = \App\CustomerOrder::where('store_number', $store_number)->get();

        return view('store-orders')->with(['orders' => $orders]);
    }
}
