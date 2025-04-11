<?php

namespace App\Http\Controllers\Swagger\Api;

/**
 * @OA\Post(
 *     path="/api/prices",
 *     summary="Create new",
 *     tags={"Prices"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="configuration_id",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                      property="price",
 *                      type="integer"
 *                 ),
 *                  @OA\Property(
 *                       property="start_date",
 *                       type="string"
 *                  ),
 *                  @OA\Property(
 *                       property="end_date",
 *                       type="string"
 *                  ),
 *                 example={"configuration_id": "10", "price": 10000, "start_date": "2020-09-11 12:12:12", "end_date": "2020-09-12 12:12:12"}
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 ref="#/components/schemas/Price"
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
 *      path="/api/prices/{priceId}",
 *      summary="Update by ID",
 *      tags={"Prices"},
 *      @OA\Parameter(
 *          name="priceId",
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
 *                  required={"configuration_id", "price", "start_date", "end_date"},
 *                  @OA\Property(
 *                      property="configuration_id",
 *                      type="integer",
 *                      example="10"
 *                  ),
 *                  @OA\Property(
 *                       property="price",
 *                       type="integer",
 *                       example="1000"
 *                  ),
 *                   @OA\Property(
 *                        property="start_date",
 *                        type="string",
 *                       example="2020-09-11 12:12:12"
 *                   ),
 *                   @OA\Property(
 *                        property="end_date",
 *                        type="string",
 *                       example="2020-09-12 12:12:12"
 *                   ),
 *              ),
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
 *       path="/api/prices/{priceId}",
 *       summary="Delete by ID",
 *       tags={"Prices"},
 *       @OA\Parameter(
 *           name="priceId",
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
 *      path="/api/prices/{priceId}",
 *      summary="Get by ID",
 *      tags={"Prices"},
 *      @OA\Parameter(
 *          name="priceId",
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
 *                  ref="#/components/schemas/Price"
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
class SwaggerPriceController extends SwaggerController
{

}
