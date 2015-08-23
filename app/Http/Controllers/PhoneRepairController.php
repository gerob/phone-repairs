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

        // Remove the service if it does not have a name
        $check_services = $request->get('services');
        $services = [];
        foreach ($check_services as $index => $service) {
            if (array_has($service, 'name')) {
                $services[$index] = $service;
            }
        }

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

        $customer->devices()->create([
            'device_name'   => $request->get('device'),
            'color'         => $request->get('color'),
            'serial_number' => $request->get('serial_number'),
            'passcode'      => $request->get('passcode', null),
            'carrier'       => $request->get('carrier'),
            'claim_number'  => $request->get('claim_number', null),
            'description'   => $request->get('description'),
            'store_number'  => $request->get('store_number'),
            'services'      => serialize($services)
        ]);

        $invoice = $customer->invoices()->create([
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
            'services'      => serialize($services),
            'confirmed'     => false
        ]);

        return redirect()->route('repairs.review', $invoice->id);
    }

    public function getReviewOrder($invoice_id)
    {
        $invoice = \App\CustomerInvoice::find($invoice_id);

        return view('review')->with(['invoice' => $invoice]);
    }

    public function postReviewOrder(Request $request)
    {
        $invoice = \App\CustomerInvoice::find($request->get('invoice_id'));
        $invoice->confirmed = true;
        $invoice->save();

        return redirect()->route('repairs.confirmation', $invoice->id);
    }

    public function getConfirmRepairs($invoice_id)
    {
        $invoice = \App\CustomerInvoice::find($invoice_id);

        return view('confirmation')->with(['invoice' => $invoice]);
    }
}
