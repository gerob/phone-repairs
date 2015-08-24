<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function getRequiredInventory()
    {
        $orders = \App\CustomerOrder::where('confirmed', true)->with('coServices', function ($query) {
            $query->where('work_completed', false)
                ->orderBy('store_number', 'desc');
        })->get();
dd($orders);
//        foreach ($orders->coServices as $services) {
//            dd($services);
//        }
    }
}
