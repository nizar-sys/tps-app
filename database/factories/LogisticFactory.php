<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logistic>
 */
class LogisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_barang' => $this->faker->slug(1),
            'category_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'stok_barang' => rand(1, 99),
        ];
    }
}
