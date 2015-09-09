<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $devices = Device::orderBy('model', 'DESC')->get();

        return view('devices.all')->with(compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('devices.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'manufacturer' => 'required',
            'model' => 'required|unique:devices'
        ]);

        $device = Device::create([
            'manufacturer' => $request->get('manufacturer'),
            'model' => $request->get('model')
        ]);

        return redirect(route('devices.all'))->with('success', $device->model . ' created!');
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

        return view('devices.edit')->with(compact('device'));
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
        $this->validate($request, [
            'manufacturer' => 'required',
            'model' => 'required|unique:devices,model,'.$device_id
        ]);

        $device = Device::findOrFail($device_id);
        $device->manufacturer = $request->get('manufacturer');
        $device->model = $request->get('model');
        $device->save();

        return redirect(route('devices.all'))->with('success', $device->model . ' updated!');
    }
}
