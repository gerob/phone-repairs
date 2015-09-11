<?php

namespace App\Http\Controllers;

use App\DeviceService;
use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = Service::orderBy('name', 'ASC')->get();

        return view('services.all')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services.new');
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
            'service_name' => 'required|min:3|unique:services,name'
        ]);

        $service = Service::create([
            'name' => $request->get('service_name')
        ]);

        return redirect(route('services.all'))->with('success', $service->name . ' created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $service_id
     * @return Response
     */
    public function edit($service_id)
    {
        $service = Service::findOrFail($service_id);

        return view('services.edit')->with(compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $service_id
     * @return Response
     */
    public function update(Request $request, $service_id)
    {
        $this->validate($request, [
            'service_name' => 'required|min:3|unique:services,name,' . $service_id
        ]);

        $service = Service::findOrFail($service_id);
        $service->name = $request->get('service_name');
        $service->save();

        return redirect(route('services.all'))->with('success', $service->name . ' updated!');
    }
}
