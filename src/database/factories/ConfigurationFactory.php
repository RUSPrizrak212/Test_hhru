<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Configuration>
 */
class ConfigurationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'car_id' => Car::query()->inRandomOrder()->value('id'),
        ];
    }
}
