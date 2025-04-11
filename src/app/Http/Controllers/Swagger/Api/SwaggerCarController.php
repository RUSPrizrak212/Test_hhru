<?php

namespace App\Http\Controllers\Swagger\Api;

/**
 * @OA\Post(
 *     path="/api/cars",
 *     summary="Create new",
 *     tags={"Cars"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 example={"name": "Kia rio 3"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 ref="#/components/schemas/Car"
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
 *      path="/api/cars/{carId}",
 *      summary="Update by ID",
 *      tags={"Cars"},
 *      @OA\Parameter(
 *          name="carId",
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
 *          response=204,
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
 *       path="/api/cars/{carId}",
 *       summary="Delete by ID",
 *       tags={"Cars"},
 *       @OA\Parameter(
 *           name="carId",
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
 *      path="/api/cars/{carId}",
 *      summary="Get by ID",
 *      tags={"Cars"},
 *      @OA\Parameter(
 *          name="carId",
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
 *                  ref="#/components/schemas/Car"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=404,
 *          description="Not found",
 *          @OA\JsonContent(ref="#/components/schemas/Error")
 *      )
 *  )
 *
 * @OA\Get(
 *      path="/api/cars/available",
 *      summary="Get list cars available (actual price)",
 *      tags={"Cars"},
 *       @OA\Response(
 *           response=200,
 *           description="Successful",
 *           @OA\JsonContent(
 *               type="object",
 *               @OA\Property(
 *                   property="data",
 *                   type="array",
 *                   @OA\Items(
 *                      allOf={
 *                          @OA\Schema(ref="#/components/schemas/Car"),
 *                          @OA\Schema(
 *                              type="object",
 *                              @OA\Property(
 *                                  property="configurations",
 *                                  type="array",
 *                                  @OA\Items(
 *                                      allOf={
 *                                          @OA\Schema(
 *                                              type="object",
 *                                              @OA\Property(property="id", type="integer", description="ID", example=10),
 *                                              @OA\Property(property="name", type="string", description="Name", example="Lux"),
 *                                              @OA\Property(property="options", type="array", description="Name", @OA\Items(type="string", example="Lanterns")),
 *                                              @OA\Property(property="current_price", type="integer", description="Actual price", example=10000),
 *                                          ),
 *                                      }
 *                                  )
 *                              )
 *                          ),
 *                      }
 *                  )
 *               )
 *           )
 *       ),
 *       @OA\Response(
 *           response=404,
 *           description="Not found",
 *           @OA\JsonContent(ref="#/components/schemas/Error")
 *       )
 *  )
 */
class SwaggerCarController extends SwaggerController
{

}
