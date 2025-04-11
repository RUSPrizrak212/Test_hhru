<?php

namespace App\Http\Controllers\Swagger\Api;

/**
 * @OA\Post(
 *     path="/api/configurations",
 *     summary="Create new",
 *     tags={"Configurations"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="car_id",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                      property="name",
 *                      type="string"
 *                 ),
 *                 example={"car_id": 10, "name": "Lux"}
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 ref="#/components/schemas/Configuration"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error",
 *         @OA\JsonContent(ref="#/components/schemas/Error")
 *     )
 * ),
 *
 * @OA\Patch(
 *      path="/api/configurations/{configurationId}",
 *      summary="Update by ID",
 *      tags={"Configurations"},
 *      @OA\Parameter(
 *          name="configurationId",
 *          in="path",
 *          description="ID",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  required={"name"},
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                      example="Kia Rio 3"
 *                  )
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successfully"
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Validation error",
 *          @OA\JsonContent(ref="#/components/schemas/Error")
 *      ),
 *  )
 *
 * @OA\Delete(
 *       path="/api/configurations/{configurationsId}",
 *       summary="Delete by ID",
 *       tags={"Configurations"},
 *       @OA\Parameter(
 *           name="configurationsId",
 *           in="path",
 *           description="ID",
 *           required=true,
 *           @OA\Schema(type="integer")
 *       ),
 *       @OA\Response(
 *           response=204,
 *           description="Successfully"
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Not found",
 *           @OA\JsonContent(ref="#/components/schemas/Error")
 *       )
 *   )
 *
 * @OA\Get(
 *      path="/api/configurations/{configurationsId}",
 *      summary="Get by ID",
 *      tags={"Configurations"},
 *      @OA\Parameter(
 *          name="configurationsId",
 *          in="path",
 *          description="ID",
 *          required=true,
 *          @OA\Schema(type="integer")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successfully",
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="data",
 *                  ref="#/components/schemas/Configuration"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Not found",
 *          @OA\JsonContent(ref="#/components/schemas/Error")
 *      )
 *  )
 */
class SwaggerConfigurationController extends SwaggerController
{

}
