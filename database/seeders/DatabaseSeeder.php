<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Family;
use App\Models\Revenue;
use App\Models\Expense;
use App\Models\Goal;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur de test
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            // 'role' => 'user',
        ]);

        // Créer une famille de test
        $family = Family::create([
            'name' => 'Test Family',
        ]);

        // Associer l'utilisateur à la famille en tant que propriétaire
        $user->families()->attach($family->id, ['is_owner' => true, 'permissions' => 'admin']);

        // Créer des revenus de test pour l'utilisateur
        Revenue::factory(3)->create([
            'user_id' => $user->id,
             'family_id' => $family->id,
        ]);

        // Créer des dépenses de test pour l'utilisateur
        Expense::factory(3)->create([
            'user_id' => $user->id,
            'family_id' => $family->id,
        ]);

        // Créer des goals de test pour l'utilisateur
        Goal::factory(3)->create([
            'user_id' => $user->id,
            'family_id' => $family->id,
        ]);
    }
}