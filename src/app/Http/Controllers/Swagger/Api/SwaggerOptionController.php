<?php

namespace App\Http\Controllers\Swagger\Api;

/**
 * @OA\Post(
 *     path="/api/options",
 *     summary="Create new",
 *     tags={"Options"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                      property="name",
 *                      type="string"
 *                 ),
 *                 example={"name": "Lux"}
 *             ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Successfully",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="data",
 *                 ref="#/components/schemas/Option"
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
 *      path="/api/options/{optionId}",
 *      summary="Update by ID",
 *      tags={"Options"},
 *      @OA\Parameter(
 *          name="optionsId",
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
 *                      example="Box"
 *                  ),
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
 *       path="/api/options/{optionId}",
 *       summary="Delete by ID",
 *       tags={"Options"},
 *       @OA\Parameter(
 *           name="optionId",
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
 *      path="/api/options/{optionId}",
 *      summary="Get by ID",
 *      tags={"Options"},
 *      @OA\Parameter(
 *          name="optionId",
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
 *                  ref="#/components/schemas/Option"
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
class SwaggerOptionController extends SwaggerController
{

}
