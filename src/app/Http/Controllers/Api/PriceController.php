<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Swagger\Api\SwaggerPriceController;
use App\Http\Requests\Api\Price\StoreRequest;
use App\Http\Requests\Api\Price\UpdateRequest;
use App\Http\Resources\Api\PriceResponse;
use App\Models\Price;
use Illuminate\Http\Response;

class PriceController extends SwaggerPriceController
{
    public function store(StoreRequest $request): PriceResponse
    {
        return PriceResponse::make(Price::query()->create($request->validated()));
    }

    public function show(Price $price): PriceResponse
    {
        return PriceResponse::make($price);
    }

    public function update(Price $price, UpdateRequest $request): Response
    {
        $price->update($request->validated());

        return response()->noContent();
    }

    public function destroy(Price $price): Response
    {
        $price->delete();

        return response()->noContent();
    }
}
