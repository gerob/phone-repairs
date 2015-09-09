<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $stores = Store::orderBy('number', 'ASC')->get();

        return view('stores.all')->with(compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('stores.new');
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
            'store_number' => 'required|min:3|unique:stores,number'
        ]);

        $store = Store::create([
            'number' => $request->get('store_number')
        ]);

        return redirect(route('stores.all'))->with('success', $store->number . ' created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $store_id
     * @return Response
     */
    public function edit($store_id)
    {
        $store = Store::findOrFail($store_id);

        return view('stores.edit')->with(compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $store_id
     * @return Response
     */
    public function update(Request $request, $store_id)
    {
        $this->validate($request, [
            'store_number' => 'required|min:3|unique:stores,number,' . $store_id
        ]);

        $store = Store::findOrFail($store_id);
        $store->number = $request->get('store_number');
        $store->save();

        return redirect(route('stores.all'))->with('success', $store->number . ' updated!');
    }
}
