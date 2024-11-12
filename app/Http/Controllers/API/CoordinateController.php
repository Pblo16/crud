<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Coordinate::all();
        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = Coordinate::create($request->all());
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinate $coordinate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordinate $coordinate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinate $coordinate)
    {
        //
    }
}
