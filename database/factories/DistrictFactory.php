<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\District>
 */
class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kecamatan' => $this->faker->city(),
            'region_id' => $this->faker->randomElement([1,2,3,4]),
            'mentor_id' => $this->faker->randomElement(['4']),
            'status_kecamatan' => $this->faker->randomElement(["basis","sebaran","penyangga","optimis"]),
            'vote_2014' => $this->faker->randomNumber(),
            'vote_2019' => $this->faker->randomNumber(),
            'target_rumah' => $this->faker->randomNumber(),
            'progres' => $this->faker->randomNumber(),
        ];
    }
}
