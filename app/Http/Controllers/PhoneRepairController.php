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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'device' => 'required',
            'color' => 'required',
            'serial_number' => 'required',
            'carrier' => 'required',
            'claim_number' => 'required_with:claim',
            'description' => 'required',
            'store_number' => 'required',
            'services' => 'required'
        ]);

        dd($request->all());
    }
}
