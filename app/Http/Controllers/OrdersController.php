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
}
