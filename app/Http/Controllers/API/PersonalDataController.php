<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = PersonalData::all();
        return response()->json($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $res = PersonalData::create($request->all());
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $personalData = PersonalData::find($id);

        if (is_null($personalData)) {
            return response()->json(['message' => 'Resource not found'], 404);
        }

        return response()->json($personalData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalData $personalData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalData $personalData)
    {
        //
    }
}
