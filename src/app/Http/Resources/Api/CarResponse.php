<?php

namespace App\Http\Resources\Api;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Car
 */
class CarResponse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'configurations' => ConfigurationResponse::collection($this->whenLoaded('configurations')),
        ];
    }
}
