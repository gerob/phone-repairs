<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreUser;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.all')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $stores = Store::all();

        return view('users.new')->with(compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'email'    => 'required|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ]);

        $user = User::create([
            'username' => $request->get('username'),
            'email'    => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        foreach (Store::all() as $index => $store) {
            $user->stores()->attach($store->id, ['default' => ($store->id == $request->get('store_id') ? true : false)]);
        }

        return redirect(route('users.all'))->with('success', 'User was created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $user_id
     * @return Response
     */
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $stores = $user->stores;

        return view('users.edit')->with(compact('user', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $user_id
     * @return Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'email'    => 'required|unique:users,email,' . $user_id,
            'password' => 'min:5|confirmed'
        ]);

        $store = Store::findOrFail($request->get('store_id'));
        $user = User::findOrFail($user_id);

        $user->username = $request->get('username', $user->username);
        $user->email = $request->get('email', $user->email);
        if ($password = $request->get('password')) {
            $user->password = bcrypt($password);
        }
        $user->save();

        // Set to fault so we don't ever end up with 2 default stores
        $store_user = StoreUser::where('user_id', $user->id)->where('default', true)->first();
        $store_user->default = false;
        $store_user->save();

        $user->stores()->updateExistingPivot($store->id, ['default' => true]);

        return redirect(route('users.all'))->with('success', 'User was updated!');
    }
}
