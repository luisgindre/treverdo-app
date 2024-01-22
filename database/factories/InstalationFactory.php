<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InstalationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = Client::factory()->create();

        return [
            'client_id' => $client->id,
            'instalation_location' => $this->faker->city,
            'instalation_adress' => $this->faker->address,
            'name' => $this->faker->name,
            'instalation_total_area' => $this->faker->numberBetween(100, 1000),
            'instalation_total_irrigation_area' => $this->faker->numberBetween(50, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
