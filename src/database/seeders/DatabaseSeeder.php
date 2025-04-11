<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Configuration;
use App\Models\Option;
use App\Models\Price;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Option::factory(10)->create();
        Car::factory(10)->create();

        Configuration::factory(10)
            ->create()
            ->each(
            /**
             * @throws RandomException
             */
            function (Configuration $configuration) {
                $configuration->options()->sync(Option::query()->inRandomOrder()->limit(random_int(1,3))->pluck('id'));
            });

        Price::factory(10)->create();
    }
}
