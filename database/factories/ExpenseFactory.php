<?php

namespace Database\Factories;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
     protected $model = Expense::class;
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
            'amount' => $this->faker->randomFloat(2, 10, 1000), // Montant aléatoire entre 10 et 1000 avec 2 décimales
            'date' => $this->faker->date(),
            'category' => $this->faker->word,
        ];
    }
}