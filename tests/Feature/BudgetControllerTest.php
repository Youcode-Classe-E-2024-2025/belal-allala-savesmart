<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\BudgetOptimizationService;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BudgetController;

class BudgetControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_access_optimization_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/optimize');

        $response->assertStatus(200);
        $response->assertViewIs('budget.form'); 
    }

    public function test_guest_cannot_access_optimization_form()
    {
        $response = $this->get('/optimize');

        $response->assertRedirect('/login');
    }

    public function test_optimize_method_returns_correct_results()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
         $data = [
            'income' => 3000,
            'needs' => 50,
            'wants' => 30,
            'savings' => 20,
        ];

        $response = $this->post('/optimize', $data);

        $response->assertStatus(200);

        $response->assertViewHas('result', [
            'needs' => 1500.0,
            'wants' => 900.0,
            'savings' => 600.0,
        ]);
    }

    public function test_optimize_method_validates_correctly()
    {

        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('/optimize', [
            'income' => 'not a number',
            'needs' => 'not a number',
            'wants' => 'not a number',
            'savings' => 'not a number',
        ]);

        $response->assertSessionHasErrors(['income', 'needs', 'wants', 'savings']);
    }
}