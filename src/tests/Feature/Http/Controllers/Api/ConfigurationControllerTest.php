<?php

use App\Models\Car;
use App\Models\Configuration;
use Tests\TestCase;

class ConfigurationControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Car::factory(10)->create();
    }

    public function test_can_create_configuration(): void
    {
        $data = [
            'car_id' => Car::factory()->create()->id,
            'name' => $this->faker->name,
        ];

        $response = $this->post("api/configurations", $data);

        $response->assertCreated();
        $response->assertJsonStructure(['data' => $this->getStructure()]);
        $this->assertDatabaseCount(Configuration::class, 1);
    }

    public function test_can_update_configuration(): void
    {
        $configuration = Configuration::factory()->create();
        $data = [
            'car_id' => Car::factory()->create()->id,
            'name' => $this->faker->name,
        ];

        $response = $this->patch("api/configurations/$configuration->id", $data);

        $response->assertNoContent();
        $this->assertDatabaseHas(Configuration::class, [
            'id' => $configuration->id,
            ...$data
        ]);
    }

    public function test_can_show_configuration(): void
    {
        $configuration = Configuration::factory()->create();

        $response = $this->get("api/configurations/$configuration->id");

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $configuration->id,
            ]
        ]);
        $response->assertJsonStructure(['data' => $this->getStructure()]);
    }

    public function test_can_delete_configuration(): void
    {
        $configuration = Configuration::factory()->create();

        $response = $this->delete("api/configurations/$configuration->id");

        $response->assertNoContent();
        $this->assertDatabaseMissing(Configuration::class, ['id' => $configuration->id]);
    }

    private function getStructure(): array
    {
        return [
            'id',
            'name',
        ];
    }
}
