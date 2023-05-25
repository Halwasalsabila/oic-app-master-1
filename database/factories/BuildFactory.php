<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Build>
 */
class BuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'inventory_card' => $this->faker->word(),
            'project' => 'BUILD ' . $this->faker->name(),
            'price' => $this->faker->randomNumber(),
            'location' => $this->faker->word(),
            'loan_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'buy_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'condition' => $this->faker->randomElement(['Baik', 'Rusak', 'Dijual', 'Hilang']),
            'description' => $this->faker->sentence(2)
        ];
    }
}
