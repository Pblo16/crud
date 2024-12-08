<?php

namespace App\Http\Controllers\API;

/**
 * @OA\Tag(
 *     name="Test",
 *     description="API Endpoints for users testing"
 * )
 */

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/test",
     *     tags={"Test"},
     *     summary="Get list of users",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function index()
    {
        //
        $res = User::all();
        return response()->json($res);
    }

    /**
     * @OA\Get(
     *     path="/api/test/{id}",
     *     tags={"Test"},
     *     summary="Get user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function getUserById($id)
    {
        $res = User::find($id);
        return response()->json($res);
    }

    /**
     * @OA\Post(
     *     path="/api/test",
     *     tags={"Test"},
     *     summary="Create a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function store(Request $request)
    {
        //
        $res = User::create($request->all());
        return response()->json($res);
    }

    /**
     * @OA\Get(
     *     path="/api/test/{user}",
     *     tags={"Test"},
     *     summary="Get user by ID",
     *     @OA\Parameter(
     *         name="user",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * @OA\Put(
     *     path="/api/test/{id}",
     *     tags={"Test"},
     *     summary="Update user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        //
        $res = User::find($id);
        return $res->update($request->json()->all());
    }

    /**
     * @OA\Delete(
     *     path="/api/test/{id}",
     *     tags={"Test"},
     *     summary="Delete user by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="User deleted"
     *     )
     * )
     */
    public function destroy(User $user)
    {
        //
        return $user->delete();
    }
}
