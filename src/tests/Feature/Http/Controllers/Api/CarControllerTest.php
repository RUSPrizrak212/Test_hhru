<?php

use App\Models\Car;
use App\Models\Configuration;
use App\Models\Option;
use App\Models\Price;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    public function test_can_create_car(): void
    {
        $carData = [
            'name' => $this->faker->name,
        ];

        $response = $this->post("api/cars", $carData);

        $response->assertCreated();
        $response->assertJsonStructure(['data' => $this->getCarStructure()]);
        $this->assertDatabaseCount(Car::class, 1);
    }

    public function test_can_update_car(): void
    {
        $car = Car::factory()->create();
        $carData = [
            'name' => $car->name . $this->faker->name,
        ];

        $response = $this->patch("api/cars/$car->id", $carData);

        $response->assertNoContent();
        $this->assertDatabaseHas(Car::class, [
            'id' => $car->id,
            ...$carData
        ]);
    }

    public function test_can_show_car(): void
    {
        $car = Car::factory()->create();

        $response = $this->get("api/cars/$car->id");

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $car->id,
            ]
        ]);
        $response->assertJsonStructure(['data' => $this->getCarStructure()]);
    }

    public function test_can_delete_car(): void
    {
        $car = Car::factory()->create();

        $response = $this->delete("api/cars/$car->id");

        $response->assertNoContent();
        $this->assertDatabaseMissing(Car::class, ['id' => $car->id]);
    }

    public function test_can_get_available_cars(): void
    {
        Option::factory(6)->create();

        $configurations = [];
        Car::factory(3)
            ->create()
            ->each(function (Car $car) use (&$configurations) {
                $configurationOne = Configuration::factory()->create(['car_id' => $car]);
                $configurationOne->options()->sync(Option::query()->inRandomOrder()->limit(2)->pluck('id'));

                $configurations[] = $configurationOne->id;
            });

        Car::factory(3)
            ->create()
            ->each(function (Car $car) {
               $configurationOne = Configuration::factory()->create(['car_id' => $car]);
               $configurationOne->options()->sync(Option::query()->inRandomOrder()->limit(2)->pluck('id'));

               $configurationTwo = Configuration::factory()->create(['car_id' => $car]);
               $configurationTwo->options()->sync(Option::query()->inRandomOrder()->limit(2)->pluck('id'));

               Price::factory()
                   ->create([
                       'configuration_id' => $configurationTwo->id,
                       'start_date' => now()->subHours(2),
                       'end_date' => now()->subHours(),
                   ]);

               Price::factory()
                   ->create([
                       'configuration_id' => $configurationTwo->id,
                       'start_date' => now(),
                       'end_date' => now()->addHours(),
                   ]);

               Price::factory()
                   ->create([
                       'configuration_id' => $configurationTwo->id,
                       'start_date' => now()->addHours(),
                       'end_date' => now()->addHours(2),
                       ]);
            });

        $now = now();

        $responseOne = $this->get('api/cars/available');
        $responseOne->assertOk();

        foreach ($configurations as $configurationId) {
            Price::factory()
                ->create([
                    'configuration_id' => $configurationId,
                    'start_date' => now(),
                    'end_date' => now()->addHours(),
                ]);
        }

        $this->travelTo($now->addMinutes(9));

        $responseTwo = $this->get('api/cars/available');
        $responseTwo->assertOk();

        $this->assertEquals($responseOne->json(), $responseTwo->json());

        $responseTwo->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'configurations' => [
                        '*' => [
                            'id',
                            'name',
                            'options',
                            'current_price',
                        ]
                    ]
                ]
            ]
        ]);
    }

    private function getCarStructure(): array
    {
        return [
            'id',
            'name',
        ];
    }
}
