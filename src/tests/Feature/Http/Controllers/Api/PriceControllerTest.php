<?php

use App\Models\Car;
use App\Models\Configuration;
use App\Models\Option;
use App\Models\Price;
use Tests\TestCase;

class PriceControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Car::factory()->create();
        Configuration::factory(10)->create();
    }

    public function test_can_create_price(): void
    {
        $data = [
            'configuration_id' => Configuration::factory()->create()->id,
            'price' => $this->faker->numberBetween(100, 1000),
            'start_date' => now(),
            'end_date' => now()->addDay(),
        ];

        $response = $this->post("api/prices", $data);

        $response->assertCreated();
        $response->assertJsonStructure(['data' => $this->getStructure()]);
        $this->assertDatabaseCount(Price::class, 1);
    }

    public function test_can_update_price(): void
    {
        $price = Price::factory()->create();
        $data = [
            'configuration_id' => Configuration::factory()->create()->id,
            'price' => $this->faker->numberBetween(100, 1000),
            'start_date' => now(),
            'end_date' => now()->addDay(),
        ];

        $response = $this->patch("api/prices/$price->id", $data);

        $response->assertNoContent();
        $this->assertDatabaseHas(Price::class, [
            'id' => $price->id,
            ...$data
        ]);
    }

    public function test_can_show_price(): void
    {
        $price = Price::factory()->create();

        $response = $this->get("api/prices/$price->id");

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $price->id,
            ]
        ]);
        $response->assertJsonStructure(['data' => $this->getStructure()]);
    }

    public function test_can_delete_price(): void
    {
        $price = Price::factory()->create();

        $response = $this->delete("api/prices/$price->id");

        $response->assertNoContent();
        $this->assertDatabaseMissing(Option::class, ['id' => $price->id]);
    }

    private function getStructure(): array
    {
        return [
            'id',
            'price',
            'start_date',
            'end_date',
        ];
    }
}
