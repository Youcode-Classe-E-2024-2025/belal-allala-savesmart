<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail; // Exemple d'e-mail envoyé lors de l'inscription

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_view_registration_form()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_user_can_register_with_valid_data()
    {
        Mail::fake(); // Empêche l'envoi d'e-mails pendant le test

        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->post('/register', $userData);

        $response->assertRedirect('/home');
        $this->assertCount(1, User::all());

        $user = User::first();
        $this->assertEquals($userData['name'], $user->name);
        $this->assertEquals($userData['email'], $user->email);
        $this->assertTrue(Hash::check('password', $user->password));
        $this->assertAuthenticatedAs($user);

        // Vérifier qu'un e-mail de bienvenue a été envoyé
        Mail::assertSent(WelcomeEmail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function test_user_cannot_register_with_invalid_data()
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
        $this->assertCount(0, User::all());
    }

    public function test_user_cannot_register_with_duplicate_email()
    {
        $existingUser = User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => $this->faker->name,
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertCount(1, User::all());
    }
}