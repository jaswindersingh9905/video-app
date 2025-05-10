<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(3),
            'status_id' =>random_int(1, 5),
            'start_date' =>fake()->dateTimeBetween('now', '+1 month'),
            'due_date' => fake()->dateTimeBetween('+1 month', '+2 month'),
            'priority' => random_int(1, 3),
            'description' => fake()->paragraph(6),
            'created_by' => random_int(1, 5),
            'assigned_to' => random_int(1, 5)
        ];
    }
}
