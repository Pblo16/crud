<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $res = User::all();
        return response()->json($res);
    }


    public function getUserById($id)
    {
        $res = User::find($id);
        return response()->json($res);
    }

    /**
     * Store a newly created resource in <storage class=""></storage>
     */
    public function store(Request $request)
    {
        //
        $res = User::create($request->all());
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
