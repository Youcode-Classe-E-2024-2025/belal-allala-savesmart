<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goal>
 */
class GoalFactory extends Factory
{
     protected $model = Goal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'family_id' => null, // Ou une logique pour attribuer un family_id si nécessaire
            'description' => $this->faker->sentence,
            'target_amount' => $this->faker->randomFloat(2, 100, 5000),
            'current_amount' => $this->faker->randomFloat(2, 0, 100),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}