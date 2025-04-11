<?php

namespace App\Http\Controllers\Swagger\Api;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Example for response examples value"
 * ),
 * @OA\PathItem(
 *     path="/api/"
 * ),
 * @OA\Components(
 *      @OA\Schema(
 *          schema="Error",
 *          type="object",
 *          required={"name"},
 *          @OA\Property(property="code", type="integer", description="Code", example=404),
 *          @OA\Property(property="message", type="string", description="Message", example="Not found"),
 *      ),
 *      @OA\Schema(
 *          schema="Car",
 *          type="object",
 *          required={"name"},
 *          @OA\Property(property="id", type="integer", description="ID", example=10),
 *          @OA\Property(property="name", type="string", description="Name", example="Kia rio 3"),
 *      ),
 *       @OA\Schema(
 *           schema="Configuration",
 *           type="object",
 *           required={"name"},
 *           @OA\Property(property="id", type="integer", description="ID", example=10),
 *           @OA\Property(property="name", type="string", description="Name", example="Lux"),
 *       ),
 *       @OA\Schema(
 *            schema="Option",
 *            type="object",
 *            required={"name"},
 *            @OA\Property(property="id", type="integer", description="ID", example=10),
 *            @OA\Property(property="name", type="string", description="Name", example="Lux"),
 *        ),
 *        @OA\Schema(
 *             schema="Price",
 *             type="object",
 *             required={"configuration_id", "price", "start_date", "end_date"},
 *             @OA\Property(property="configuration_id", type="integer", description="Configuration ID", example=10),
 *             @OA\Property(property="price", type="integer", description="Price", example=1000),
 *             @OA\Property(property="start_date", type="string", description="Start date", example="2020-09-11 12:12:12"),
 *             @OA\Property(property="end_date", type="string", description="End date", example="2020-09-12 12:12:12"),
 *         ),
 *  ),
 */
class SwaggerController extends Controller
{

}
