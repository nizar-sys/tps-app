<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tps>
 */
class TpsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'village_id' => $this->faker->numberBetween(1, 20),
            'nama_tps' => $this->faker->name,
            'tim_id' => 6,
            'status_tps' => $this->faker->randomElement(['basis', 'sebaran', 'penyangga', 'optimis']),
            'vote_2014' => $this->faker->numberBetween(0, 100),
            'vote_2019' => $this->faker->numberBetween(0, 100),
            'target_rumah' => $this->faker->numberBetween(0, 100),
            'progres' => $this->faker->numberBetween(0, 100),
        ];
    }
}
