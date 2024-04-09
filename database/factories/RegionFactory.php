<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_wilayah' => $this->faker->city(), // 'Jakarta
            'mentor_id' => $this->faker->numberBetween(3, 4),
            'operator_id' => $this->faker->numberBetween(3, 4),
            'status_wilayah' => $this->faker->randomElement(["basis","sebaran","penyangga","optimis"]),
            'vote_2014' => $this->faker->randomNumber(),
            'vote_2019' => $this->faker->randomNumber(),
            'target_rumah' => $this->faker->randomNumber(),
            'progres' => $this->faker->randomNumber(),
        ];
    }
}
