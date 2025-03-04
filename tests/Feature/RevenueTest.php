<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Revenue;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class RevenueTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_view_revenue_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/revenues');

        $response->assertStatus(200);
        $response->assertViewIs('revenues.index');
    }

    public function test_guest_cannot_view_revenue_index()
    {
        $response = $this->get('/revenues');

        $response->assertRedirect('/login');
    }

    public function test_user_can_create_revenue()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/revenues/create');

        $response->assertStatus(200);
        $response->assertViewIs('revenues.create');
    }

    public function test_guest_cannot_create_revenue()
    {
        $response = $this->get('/revenues/create');

        $response->assertRedirect('/login');
    }

    public function test_user_can_store_revenue()
    {
        $user = User::factory()->create();

        // Créer une catégorie de test
        $category = Category::create([
            'user_id' => $user->id,
            'name' => 'Test Category',
            'type' => 'revenue',
        ]);

        $revenueData = [
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->date(),
            'category_id' => $category->id,
        ];

        $response = $this->actingAs($user)->post('/revenues', $revenueData);

        $response->assertRedirect('/revenues');
        $this->assertCount(1, Revenue::all());
        $this->assertDatabaseHas('revenues', [
            'user_id' => $user->id,
            'family_id' => null,
            'description' => $revenueData['description'],
            'amount' => $revenueData['amount'],
            'date' => $revenueData['date'],
            'category_id' => $category->id,
        ]);
    }

    public function test_guest_cannot_store_revenue()
    {
        $user = User::factory()->create(); // Créer un utilisateur fictif
        $this->actingAs($user); // Simuler la connexion de cet utilisateur

        $response = $this->post('/revenues', [
            'description' => 'Test Revenue',
            'amount' => 500,
            'date' => '2023-01-01',
        ]);

        $response->assertStatus(403); // Assurez-vous que les invités ne peuvent pas créer de revenu
    }

    public function test_user_can_view_revenue()
    {
        $user = User::factory()->create();

        // Créer une catégorie de test
        $category = Category::create([
            'user_id' => $user->id,
            'name' => 'Test Category',
            'type' => 'revenue',
        ]);

        $revenue = Revenue::create([
            'user_id' => $user->id,
            'family_id' => null,
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->date(),
            'category_id' => $category->id,
        ]);

        $response = $this->actingAs($user)->get('/revenues/' . $revenue->id);

        $response->assertStatus(200);
        $response->assertViewIs('revenues.show');
        $response->assertViewHas('revenue', $revenue);
    }

    public function test_user_cannot_view_another_users_revenue()
{
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    $revenue = Revenue::factory()->create(['user_id' => $user2->id]);

    $this->actingAs($user1)
         ->get('/revenues/' . $revenue->id)
         ->assertStatus(403); // Vérifie que l'utilisateur 1 ne peut pas voir le revenu de l'utilisateur 2
}

    public function test_guest_cannot_view_revenue()
    {
        $revenue = Revenue::factory()->create();

        $response = $this->get('/revenues/' . $revenue->id);

        $response->assertRedirect('/login');
    }

     public function test_user_can_edit_revenue()
    {
        $user = User::factory()->create();

        // Créer une catégorie de test
        $category = Category::create([
            'user_id' => $user->id,
            'name' => 'Test Category',
            'type' => 'revenue',
        ]);

        $revenue = Revenue::create([
            'user_id' => $user->id,
            'family_id' => null,
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->date(),
            'category_id' => $category->id,
        ]);

        $response = $this->actingAs($user)->get(route('revenues.edit', $revenue->id));

        $response->assertStatus(200);
        $response->assertViewIs('revenues.edit');
        $response->assertViewHas('revenue', $revenue);
    }
 protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }
}