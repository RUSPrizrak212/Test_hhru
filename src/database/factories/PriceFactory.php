<?php

namespace Database\Factories;

use App\Models\Configuration;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Price>
 */
class PriceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'configuration_id' => Configuration::query()->inRandomOrder()->value('id'),
            'price' => $this->faker->numberBetween(100, 1000),
            'start_date' => now(),
            'end_date' => now()->addDays($this->faker->numberBetween(1, 30)),
        ];
    }
}
