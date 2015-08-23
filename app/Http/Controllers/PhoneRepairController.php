<?php

namespace App\Http\Controllers;

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

        return redirect()->route('repairs.device', $request->get('manufacturer'));
    }

    public function getDeviceSelection($manufacturer)
    {
        // Get available devices
        $devices = \App\Device::where('manufacturer', $manufacturer)->get();

        return view('select-device')->with(['devices' => $devices, 'manufacturer' => $manufacturer]);
    }

    public function postDeviceSelection(Request $request)
    {
        $this->validate($request, [
            'device' => 'required|integer'
        ]);

        return redirect()->route('repairs.pricing', $request->get('device'));

    }

    public function getPricingForm($device)
    {
        $device = \App\Device::find($device);

        $services = $device->services()->get();

        return view('pricing')->with(['device' => $device, 'services' => $services]);
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
            'services'      => 'required'
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
            'confirmed'     => false
        ]);

        // Only add the service if it has a name
        foreach ($request->get('services') as $service) {
            if (array_has($service, 'name')) {
                $order->services()->create([
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
        $services = $order->services()->get();

        return view('review')->with(['order' => $order, 'services' => $services]);
    }

    public function postReviewOrder(Request $request)
    {
        $order = \App\CustomerOrder::find($request->get('order_id'));
        $order->confirmed = true;
        $order->save();

        return redirect()->route('repairs.confirmation', $order->id);
    }

    public function getConfirmRepairs($order_id)
    {
        $order = \App\CustomerOrder::find($order_id);
        $services = $order->services()->get();

        return view('confirmation')->with(['order' => $order, 'services' => $services]);
    }
}
