<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rak>
 */
class RakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rak_id' => $this->faker->unique()->numberBetween(1000000000000000, 9999999999999999),
            'rak_nama' => $this->faker->word(),
            'rak_lokasi' => $this->faker->city(),
            'rak_kapasitas' => $this->faker->numberBetween(50, 200),
        ];
    }
}
