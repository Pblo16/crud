<?php

namespace App\Http\Controllers\API;

/**
 * @OA\Tag(
 *     name="Personal Data",
 *     description="API Endpoints for personal data"
 * )
 */
use App\Http\Controllers\Controller;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/personals",
     *     tags={"Personal Data"},
     *     summary="Get list of personal data",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/PersonalData"))
     *     )
     * )
     */
    public function index()
    {
        $res = PersonalData::all();
        return response()->json($res);
    }

    /**
     * @OA\Post(
     *     path="/api/personals",
     *     tags={"Personal Data"},
     *     summary="Create new personal data",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PersonalData")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Personal data created",
     *         @OA\JsonContent(ref="#/components/schemas/PersonalData")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $res = PersonalData::create($request->all());
        return response()->json($res);
    }

    /**
     * @OA\Get(
     *     path="/api/personals/{id}",
     *     tags={"Personal Data"},
     *     summary="Get personal data by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/PersonalData")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resource not found"
     *     )
     * )
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
