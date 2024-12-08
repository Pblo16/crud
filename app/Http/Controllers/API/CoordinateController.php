<?php

namespace App\Http\Controllers\API;

/**
 * @OA\Tag(
 *     name="Coordinates",
 *     description="API Endpoints for coordinates"
 * )
 */

use App\Http\Controllers\Controller;
use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/coordinates",
     *     tags={"Coordinates"},
     *     summary="Get list of coordinates",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Coordinate"))
     *     )
     * )
     */
    public function index()
    {
        $res = Coordinate::all();
        return response()->json($res);
    }

    /**
     * @OA\Post(
     *     path="/api/coordinates",
     *     tags={"Coordinates"},
     *     summary="Create new coordinate",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Coordinate")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Coordinate created",
     *         @OA\JsonContent(ref="#/components/schemas/Coordinate")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $res = Coordinate::create($request->all());
        return response()->json($res);
    }

    /**
     * @OA\Get(
     *     path="/api/coordinates/{coordinate}",
     *     tags={"Coordinates"},
     *     summary="Get coordinate by ID",
     *     @OA\Parameter(
     *         name="coordinate",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Coordinate")
     *     )
     * )
     */
    public function show(Coordinate $coordinate)
    {
        return response()->json($coordinate);
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
