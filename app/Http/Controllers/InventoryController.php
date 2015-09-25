<?php

namespace App\Http\Controllers;

use App\Inventory;
use Carbon\Carbon;
use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use League\Csv\Writer;

class InventoryController extends Controller
{
    public function getRequiredInventory()
    {
        $inventory = Inventory::with('deviceService.dsDevice', 'deviceService.dsService')
            ->orderBy('store_number', 'desc')
            ->paginate(30);

        $barcode = new Barcode();

        return view('inventory')->with(['inventory' => $inventory, 'barcode' => $barcode]);
    }

    public function getWerxInventory($store_number = null)
    {
        if ($store_number == null) {
            foreach (\Auth::user()->stores()->get() as $store) {
                if ($store->pivot->default = true) $store_number = $store->number;
            }
        }

        $inventory = Inventory::whereRaw('count < threshold')
            ->where('store_number', $store_number)
            ->with('deviceService.dsDevice', 'deviceService.dsService')
            ->get();

        $barcode = new Barcode();

        return view('werx-inventory')->with(compact('inventory', 'barcode', 'store_number'));
    }

    public function getAllInventory()
    {
        $inventory = Inventory::with('deviceService.dsDevice', 'deviceService.dsService')
            ->orderBy('store_number', 'desc')
            ->get();
        dd($inventory);
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

        $request->session()->put('updates', [$updates]);

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

        return redirect()->route('inventory.werx');
    }

    public function exportInventoryToCSV()
    {
        $inventory = Inventory::whereRaw('count < threshold')
            ->with('deviceService.dsDevice', 'deviceService.dsService')
            ->orderBy('store_number', 'desc')
            ->get();

        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['Device - Service', 'UPC', 'Store Number', 'Count', 'Inventory Threshold']);

        foreach ($inventory as $inv) {
            $csv->insertOne([
                $inv->deviceService->dsDevice->model . '-' . $inv->deviceService->dsService->name,
                $inv->upc,
                $inv->store_number,
                $inv->count,
                $inv->threshold
            ]);
        }

        $csv->output(Carbon::now()->toDateString() . '-inventory.csv');
    }
}
