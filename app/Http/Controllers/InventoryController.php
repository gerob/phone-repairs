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

        return view('inventory')->with(['inventory' => $inventory, 'barcode' => $barcode]);
    }

    public function getWerxInventory()
    {
        $inventory = Inventory::whereRaw('count < threshold')
            ->with('deviceService.dsDevice', 'deviceService.dsService')
            ->orderBy('store_number', 'desc')
            ->get();

        $barcode = new Barcode();

        return view('werx-inventory')->with(['inventory' => $inventory, 'barcode' => $barcode]);
    }

    public function getAllInventory()
    {
        $inventory = Inventory::with('deviceService.dsDevice', 'deviceService.dsService')
            ->orderBy('store_number', 'desc')
            ->get();

        return view('inventory')->with('inventory', $inventory);
    }

    public function postReviewInventory(Request $request)
    {
        $updates = [];
        foreach ($request->get('inventories') as $id => $inventory) {
            if ($inventory['quantity'] == "") continue;

            $updates[$id] = [
                'name'     => $inventory['service_device'],
                'count'    => $inventory['count'],
                'store'    => $inventory['store'],
                'quantity' => $inventory['quantity']
            ];
        }

        $request->session()->flash('updates', [$updates]);

        return redirect()->route('inventory.review');
    }

    public function getReviewInventory(Request $request)
    {
        $updates = $request->session()->get('updates');

        return view('inventory-review')->with('updates', $updates[0]);
    }

    public function postUpdateInventory(Request $request)
    {
        $inventories = $request->get('updates');

        foreach ($inventories as $id => $inv) {
            $inventory = Inventory::find($id);
            $inventory->count += $inv['quantity'];
            $inventory->save();
        }

        $request->session()->flash('success', 'Inventory has been updated!');

        return redirect()->route('inventory.required');
    }
}
