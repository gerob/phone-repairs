<?php

namespace App\Http\Controllers;

use App\Device;
use Com\Tecnick\Barcode\Barcode;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewOrderController extends Controller
{

    // START ORDER - SELECT MANUFACTURER
    public function getManufacturerSelection()
    {
        return view('orders/new/manufacturer');
    }

    public function postManufacturerForm(Request $request)
    {
        $this->validate($request, [
            'manufacturer' => 'required'
        ]);

        return redirect()->route('order.new.details', $request->get('manufacturer'));
    }

    // STEP 2 -ORDER DETAILS
    public function getOrderDetailsForm($manufacturer)
    {
        $devices = Device::where('manufacturer', $manufacturer)->get();

        return view('orders/new/details')->with(compact('devices', 'manufacturer'));
    }

    public function getDeviceSelectionJson($device_id)
    {
        // Get available device services
        $device = Device::findOrFail($device_id);
        $services = $device->services()->orderBy('name', 'ASC')->get();

        return response()->json($services);
    }

    public function postOrderDetailsForm(Request $request)
    {
        $this->validate($request, [
            'first_name'          => 'required',
            'last_name'           => 'required',
            'email'               => 'required|email',
            'phone'               => 'required',
            'address'             => 'required',
            'city'                => 'required',
            'state'               => 'required',
            'zip'                 => 'required',
            'device'              => 'required',
            'serial_number'       => 'required',
            'carrier'             => 'required',
            'claim_number'        => 'required_with:claim',
            'store_number'        => 'required',
            'services'            => 'required',
            'services_details'    => 'required_with:services',
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

        $device_model = Device::find($request->get('device'))->model;

        $device = $customer->devices()->firstOrNew(['serial_number' => $request->get('serial_number')]);
        $device->device_name = $device_model;
        $device->color = $request->get('color');
        $device->passcode = $request->get('passcode', null);
        $device->carrier = $request->get('carrier');
        $device->claim_number = $request->get('claim_number', null);
        $device->description = $request->get('description');
        $device->store_number = $request->get('store_number');
        $device->save();

        $order = $customer->orders()->create([
            'first_name'          => $request->get('first_name'),
            'last_name'           => $request->get('last_name'),
            'email'               => $request->get('email'),
            'phone'               => $request->get('phone'),
            'address'             => $request->get('address'),
            'address2'            => $request->get('address2', null),
            'city'                => $request->get('city'),
            'state'               => $request->get('state'),
            'zip'                 => $request->get('zip'),
            'member_type'         => $request->get('membership_type', 'trial'),
            'member_number'       => $request->get('member_number', null),
            'device_name'         => $device_model,
            'color'               => $request->get('color'),
            'serial_number'       => $request->get('serial_number'),
            'passcode'            => $request->get('passcode', null),
            'carrier'             => $request->get('carrier'),
            'claim_number'        => $request->get('claim_number', null),
            'description'         => $request->get('description'),
            'store_number'        => $request->get('store_number'),
            'technician_initials' => $request->get('technician_initials'),
            'confirmed'           => false,
            'warranty_years'      => Carbon::now()->addYear()
        ]);

        // Only add the service if it has a name
        $service_details = $request->get('services_details');
        foreach ($request->get('services') as $service_id => $service) {
            if (array_has($service, 'name')) {
                $order->coServices()->create([
                    // Need to add device service ID to this
                    'device_service_id' => $service['device_service'],
                    'name'              => $service['name'],
                    'price'             => $service_details[$service_id]['price'],
                    'upc'               => $service_details[$service_id]['upc']
                ]);
            }
        }

        return redirect()->route('order.new.review', $order->id);
    }


    // STEP 3 - ORDER REVIEW
    public function getOrderReview($order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $services = $order->coServices()->get();

        $barcode = new Barcode();

        return view('orders/new/review')->with(compact('order', 'services', 'barcode'));
    }

    public function postOrderReview(Request $request, $order_id)
    {
        $order = \App\CustomerOrder::find($request->get('order_id'));
        $order->confirmed = false;
        $order->save();

        return redirect()->route('order.new.confirm', $order->id);
    }


    // STEP 4 - ORDER CONFIRM
    public function getOrderConfirm($order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $services = $order->coServices()->get();

        $barcode = new Barcode();

        return view('orders/new/confirm')->with(compact('order', 'services', 'barcode'));
    }

    public function postOrderConfirm(Request $request, $order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $order->confirmed = true;
        $order->save();

        // Grab the customer order services
        $services = $order->coServices()->get();
        foreach ($services as $service) {
            // Decrease our inventory count now that the order has been confirmed
            $inventory = \App\Inventory::where('device_service_id', '=', $service->device_service_id)
                ->where('store_number', '=', $order->store_number)->first();
            $inventory->count -= 1;
            $inventory->save();
        }

        return redirect()->route('orders.list');
    }
}
