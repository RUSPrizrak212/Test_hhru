<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class CarServices
{
    const string CACHE_KEY = 'cars_available';

    public function getAvailable(): Collection
    {
        if ($dataCache =  Cache::get(self::CACHE_KEY)) {
            return $dataCache;
        }

        $data = Car::query()
            ->withWhereHas('configurations', function (Builder|HasMany $query) {
                $query->with('options')->withWhereHas('currentPrice');
            })
            ->get();

        Cache::put(self::CACHE_KEY, $data, now()->addMinutes(10));

        return $data;
    }
}
