<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Village>
 */
class VillageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'district_id' => $this->faker->numberBetween(1, 20),
            'nama_desa' => $this->faker->city(),
            'tim_id' => 6,
            'status_desa' => $this->faker->randomElement(['basis', 'sebaran', 'penyangga', 'optimis']),
            'vote_2014' => $this->faker->numberBetween(0, 100),
            'vote_2019' => $this->faker->numberBetween(0, 100),
            'target_rumah' => $this->faker->numberBetween(0, 100),
            'progres' => $this->faker->numberBetween(0, 100),
        ];
    }
}
