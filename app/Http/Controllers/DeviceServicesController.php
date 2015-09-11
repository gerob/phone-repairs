<?php

namespace App\Http\Controllers;

use App\Device;
use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeviceServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $devices = Device::orderBy('model', 'ASC')->get();

        return view('deviceservices.all')->with(compact('devices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $device_id
     * @return Response
     */
    public function edit($device_id)
    {
        $device = Device::findOrFail($device_id);
        $services = $device->services()->orderBy('name', 'ASC')->get();
        $all_services = Service::orderBy('name', 'ASC')->get();

        return view('deviceservices.edit')->with(compact('device', 'services', 'all_services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $device_id
     * @return Response
     */
    public function update(Request $request, $device_id)
    {
        //
    }

}
