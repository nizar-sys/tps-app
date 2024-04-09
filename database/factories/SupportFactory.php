<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kepala_keluarga' => $this->faker->name(),
            'no_telp' => $this->faker->phoneNumber(),
            'jenis_kelamin' => $this->faker->randomElement(['l', 'p']),
            'alamat' => $this->faker->address(),
            'potensi_suara' => $this->faker->numberBetween(1, 5),
            'long_lat' => $this->faker->latitude() . ',' . $this->faker->longitude(),
            'foto_tampak_depan_rumah' => $this->faker->imageUrl(),
        ];
    }
}
