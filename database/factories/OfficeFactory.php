<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = $this->faker->randomNumber();
        $amount = $this->faker->randomNumber();
        return [
            'name' => $this->faker->name(),
            'inventory_card' => $this->faker->word(),
            'project' => 'BUILD ' . $this->faker->name(),
            'price' => $price,
            'amount' => $amount,
            'unit' => $this->faker->randomElement(['Pcs', 'Lusin', 'Unit', 'Gulung']),
            'total' => $price * $amount,
            'location' => $this->faker->word(),
            'loan_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'buy_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'condition' => $this->faker->randomElement(['Baik', 'Rusak', 'Dijual', 'Hilang']),
            'description' => $this->faker->sentence(2),

        ];
    }
}
