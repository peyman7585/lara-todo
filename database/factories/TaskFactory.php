<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Carbon\this;

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
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'is_completed'=>rand(0,1),
            'createdAt'=>now()
        ];
    }
}
