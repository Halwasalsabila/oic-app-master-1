<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $project = ['US_EMBYSY', 'Lestari', 'SOS', 'LU SH', 'TFCH', 'Arcus', 'Wish Indo'];
        $selected = $this->faker->randomElement($project);
        return [
            //
            'name' => $selected,
            'slug' => Str::slug($selected)
        ];
    }
}
