<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Swagger\Api\SwaggerCarController;
use App\Http\Requests\Api\Car\StoreRequest;
use App\Http\Requests\Api\Car\UpdateRequest;
use App\Http\Resources\Api\CarResponse;
use App\Models\Car;
use App\Services\CarServices;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CarController extends SwaggerCarController
{
    public function store(StoreRequest $request): CarResponse
    {
        return CarResponse::make(Car::query()->create($request->validated()));
    }

    public function show(Car $car): CarResponse
    {
        return CarResponse::make($car);
    }

    public function update(Car $car, UpdateRequest $request): Response
    {
        $car->update($request->validated());

        return response()->noContent();
    }

    public function destroy(Car $car): Response
    {
        $car->delete();

        return response()->noContent();
    }

    public function available(CarServices $carServices): AnonymousResourceCollection
    {
        return CarResponse::collection($carServices->getAvailable());
    }
}
