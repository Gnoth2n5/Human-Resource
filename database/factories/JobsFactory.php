<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['open', 'in_progress', 'completed']),
            'start_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'end_at' => fake()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
