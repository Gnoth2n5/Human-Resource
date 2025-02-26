<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobGradesModel>
 */
class JobGradesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade_name' => $this->faker->name(),
            'salary_multiplier' => $this->faker->randomFloat(2, 1, 10),
        ];
    }
}
