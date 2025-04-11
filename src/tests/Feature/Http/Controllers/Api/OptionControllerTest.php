<?php

use App\Models\Option;
use Tests\TestCase;

class OptionControllerTest extends TestCase
{
    public function test_can_create_option(): void
    {
        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->post("api/options", $data);

        $response->assertCreated();
        $response->assertJsonStructure(['data' => $this->getStructure()]);
        $this->assertDatabaseCount(Option::class, 1);
    }

    public function test_can_update_option(): void
    {
        $option = Option::factory()->create();
        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->patch("api/options/$option->id", $data);

        $response->assertNoContent();
        $this->assertDatabaseHas(Option::class, [
            'id' => $option->id,
            ...$data
        ]);
    }

    public function test_can_show_option(): void
    {
        $option = Option::factory()->create();

        $response = $this->get("api/options/$option->id");

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $option->id,
            ]
        ]);
        $response->assertJsonStructure(['data' => $this->getStructure()]);
    }

    public function test_can_delete_option(): void
    {
        $option = Option::factory()->create();

        $response = $this->delete("api/options/$option->id");

        $response->assertNoContent();
        $this->assertDatabaseMissing(Option::class, ['id' => $option->id]);
    }

    private function getStructure(): array
    {
        return [
            'id',
            'name',
        ];
    }
}
