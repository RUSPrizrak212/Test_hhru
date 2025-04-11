<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Swagger\Api\SwaggerOptionController;
use App\Http\Requests\Api\Option\StoreRequest;
use App\Http\Requests\Api\Option\UpdateRequest;
use App\Http\Resources\Api\OptionResponse;
use App\Models\Option;
use Illuminate\Http\Response;

class OptionController extends SwaggerOptionController
{
    public function store(StoreRequest $request): OptionResponse
    {
        return OptionResponse::make(Option::query()->create($request->validated()));
    }

    public function show(Option $option): OptionResponse
    {
        return OptionResponse::make($option);
    }

    public function update(Option $option, UpdateRequest $request): Response
    {
        $option->update($request->validated());

        return response()->noContent();
    }

    public function destroy(Option $option): Response
    {
        $option->delete();

        return response()->noContent();
    }
}
