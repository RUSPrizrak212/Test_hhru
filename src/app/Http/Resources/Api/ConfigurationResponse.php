<?php

namespace App\Http\Resources\Api;

use App\Models\Configuration;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Configuration
 */
class ConfigurationResponse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'options' => $this->whenLoaded('options', fn ($items) => $items->pluck('name')),
            'current_price' => $this->whenLoaded('currentPrice', fn (Price $item) => $item->price),
        ];
    }
}
