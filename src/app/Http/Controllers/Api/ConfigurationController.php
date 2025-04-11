<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Swagger\Api\SwaggerConfigurationController;
use App\Http\Requests\Api\Configuration\StoreRequest;
use App\Http\Requests\Api\Configuration\UpdateRequest;
use App\Http\Resources\Api\ConfigurationResponse;
use App\Models\Configuration;
use Illuminate\Http\Response;

class ConfigurationController extends SwaggerConfigurationController
{
    public function store(StoreRequest $request): ConfigurationResponse
    {
        return ConfigurationResponse::make(Configuration::query()->create($request->validated()));
    }

    public function show(Configuration $configuration): ConfigurationResponse
    {
        return ConfigurationResponse::make($configuration);
    }

    public function update(Configuration $configuration, UpdateRequest $request): Response
    {
        $configuration->update($request->validated());

        return response()->noContent();
    }

    public function destroy(Configuration $configuration): Response
    {
        $configuration->delete();

        return response()->noContent();
    }
}
