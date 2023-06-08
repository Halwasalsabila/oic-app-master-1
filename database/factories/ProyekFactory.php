<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyek>
 */
class ProyekFactory extends Factory
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
            'project' => Project::factory()->create()->id,
            'price' => $this->faker->randomNumber(),
            'location' => $this->faker->word(),
            'loan_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'buy_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'condition' => $this->faker->randomElement(['Baik', 'Rusak', 'Dijual', 'Hilang']),
            'user' =>  $this->faker->name(),
            'description' =>  $this->faker->sentence(),
        ];
    }
}
