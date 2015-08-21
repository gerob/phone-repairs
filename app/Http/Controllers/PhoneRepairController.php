<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhoneRepairController extends Controller
{
    public function getManufacturerSelection()
    {
        return view('select-phone');
    }

    public function postManufacturerForm(Request $request)
    {
        $this->validate($request, [
            'manufacturer' => 'required'
        ]);

        return redirect()->route('repairs.form', $request->get('manufacturer'));
    }

    public function getPricingForm($manufacturer)
    {
        // Get available devices
        $devices = \App\Device::all();

        return view('pricing')->with('devices', $devices);
    }
}
