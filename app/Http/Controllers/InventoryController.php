<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function getRequiredInventory()
    {
        $inventory = \App\Inventory::whereRaw('count <= threshold')
                        ->with('deviceService.dsDevice', 'deviceService.dsService')
                        ->orderBy('store_number', 'desc')
                        ->get();

        return view('inventory')->with('inventory', $inventory);
    }

	public function getAllInventory()
	{
		$inventory = \App\Inventory::with('deviceService.dsDevice', 'deviceService.dsService')
		                           ->orderBy('store_number', 'desc')
		                           ->get();

		return view('inventory')->with('inventory', $inventory);
	}

    public function postUpdateInventory(Request $request)
    {
        $inventories = $request->get('inventories');

        foreach ($inventories as $id => $count) {
            $inventory = \App\Inventory::find($id);
            $inventory->count += $count;
            $inventory->save();
        }
        return redirect()->route('inventory.required');
    }
}
