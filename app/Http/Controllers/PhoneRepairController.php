<?php

namespace App\Http\Controllers;

use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhoneRepairController extends Controller
{
    public function getManufacturerSelection()
    {
        return view('select-manufacturer');
    }

    public function postManufacturerForm(Request $request)
    {
        $this->validate($request, [
            'manufacturer' => 'required'
        ]);

        return redirect()->route('repairs.pricing', $request->get('manufacturer'));
    }

    public function getPricingForm($manufacturer)
    {
        $devices = \App\Device::where('manufacturer', $manufacturer)->get();

        return view('pricing')->with(compact('devices', 'manufacturer'));
    }

    public function getDeviceSelectionJson($device_id)
    {
        // Get available device services
        $device = \App\DeviceService::where('device_id', $device_id)->with('dsService')->get();

        return response()->json($device);
    }

    public function postPricingForm(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'phone'         => 'required',
            'address'       => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'zip'           => 'required',
            'device'        => 'required',
            'color'         => 'required',
            'serial_number' => 'required',
            'carrier'       => 'required',
            'claim_number'  => 'required_with:claim',
            'description'   => 'required',
            'store_number'  => 'required',
            'services'      => 'required',
	        'technician_initials' => 'required'
        ]);

        // Find and update or create our customer
        $customer = \App\Customer::firstOrNew(['email' => $request->get('email')]);
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->phone = $request->get('phone');
        $customer->address = $request->get('address');
        $customer->address2 = $request->get('address2', null);
        $customer->city = $request->get('city');
        $customer->state = $request->get('state');
        $customer->zip = $request->get('zip');
        $customer->member_type = $request->get('member_type', 'trial');
        $customer->member_number = $request->get('member_number', null);
        $customer->save();

        $device = $customer->devices()->firstOrNew(['serial_number' => $request->get('serial_number')]);
        $device->device_name = $request->get('device');
        $device->color = $request->get('color');
        $device->passcode = $request->get('passcode', null);
        $device->carrier = $request->get('carrier');
        $device->claim_number = $request->get('claim_number', null);
        $device->description = $request->get('description');
        $device->store_number = $request->get('store_number');
        $device->save();

        $order = $customer->orders()->create([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'email'         => $request->get('email'),
            'phone'         => $request->get('phone'),
            'address'       => $request->get('address'),
            'address2'      => $request->get('address2', null),
            'city'          => $request->get('city'),
            'state'         => $request->get('state'),
            'zip'           => $request->get('zip'),
            'member_type'   => $request->get('member_type', 'trial'),
            'member_number' => $request->get('member_number', null),
            'device_name'   => $request->get('device'),
            'color'         => $request->get('color'),
            'serial_number' => $request->get('serial_number'),
            'passcode'      => $request->get('passcode', null),
            'carrier'       => $request->get('carrier'),
            'claim_number'  => $request->get('claim_number', null),
            'description'   => $request->get('description'),
            'store_number'  => $request->get('store_number'),
	        'technician_initials' => $request->get('technician_initials'),
            'confirmed'     => false
        ]);

        // Only add the service if it has a name
        foreach ($request->get('services') as $service) {
            if (array_has($service, 'name')) {
                $order->coServices()->create([
                    'name'  => $service['name'],
                    'price' => $service['price'],
                    'upc'   => $service['upc']
                ]);
            }
        }

        return redirect()->route('repairs.review', $order->id);
    }

    public function getReviewOrder($order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $services = $order->coServices()->get();

        $barcode = new Barcode();

        return view('review')->with(compact('order', 'services', 'barcode'));
    }

    public function postReviewOrder(Request $request)
    {
        $order = \App\CustomerOrder::find($request->get('order_id'));
        $order->confirmed = true;
        $order->save();

        $services = $order->coServices()->get();
        foreach ($services as $service) {
            $inventory = \App\Inventory::where('upc', '=', $service->upc)
                ->where('store_number', '=', $order->store_number)->first();
            $inventory->count -= 1;
            $inventory->save();
        }

        return redirect()->route('repairs.confirmation', $order->id);
    }

    public function getConfirmRepairs($order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $services = $order->coServices()->get();

        $barcode = new Barcode();

        return view('confirmation')->with(compact('order', 'services', 'barcode'));
    }
}
