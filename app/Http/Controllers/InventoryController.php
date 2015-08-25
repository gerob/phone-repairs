<?php

namespace App\Http\Controllers;

use App\Inventory;
use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function getRequiredInventory()
    {
        $inventory = Inventory::whereRaw('count < threshold')
                        ->with('deviceService.dsDevice', 'deviceService.dsService')
                        ->orderBy('store_number', 'desc')
                        ->paginate(30);

        $barcode = new Barcode();

        return view('inventory')->with(['inventory' => $inventory, 'barcode'=> $barcode]);
    }

	public function getAllInventory()
	{
		$inventory = Inventory::with('deviceService.dsDevice', 'deviceService.dsService')
		                           ->orderBy('store_number', 'desc')
		                           ->get();

		return view('inventory')->with('inventory', $inventory);
	}

    public function postUpdateInventory(Request $request)
    {
        $inventories = $request->get('inventories');

        foreach ($inventories as $id => $count) {
            $inventory = Inventory::find($id);
            $inventory->count += $count;
            $inventory->save();
        }
        return redirect()->route('inventory.required');
    }
}
