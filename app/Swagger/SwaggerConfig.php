<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="2.0",
 *     description="This is the API documentation for the application."
 * )
 * 
 *  @OA\Tag(
 *     name="Coordinates",
 *     description="API Endpoints for coordinates"
 * )
 * 
 * @OA\Tag(
 *     name="Personal Data", 
 *     description="API Endpoints for personal data"
 * )
 * 
 * @OA\Tag(
 *     name="Test",
 *     description="API Endpoints for users testing"
 * )
 * 
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     required={"id", "name", "email"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="User ID"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="User name"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="User email"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="PersonalData",
 *     type="object",
 *     required={"id", "name", "address"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Personal Data ID"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name"
 *     ),
 *     @OA\Property(
 *         property="address",
 *         type="string",
 *         description="Address"
 *     )
 * )
 * 
 * @OA\Schema(
 *     schema="Coordinate",
 *     type="object",
 *     required={"id", "latitude", "longitude"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Coordinate ID"
 *     ),
 *     @OA\Property(
 *         property="latitude",
 *         type="number",
 *         format="float",
 *         description="Latitude"
 *     ),
 *     @OA\Property(
 *         property="longitude",
 *         type="number",
 *         format="float",
 *         description="Longitude"
 *     )
 * )
 */
class SwaggerConfig
{
    // This class is used to hold the Swagger annotations
}
