<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class RegisterTest
 *
 * @package Tests\Feature\Auth
 */
class RegisterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfCreateNewUserWithSuccess(): void
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);

        $response->assertSee([
            trans('locale.auth.register.title'),
            trans('locale.auth.register.subtile'),
            trans('locale.auth.register.full-name'),
            trans('locale.auth.register.email'),
            trans('locale.auth.register.password'),
            trans('locale.auth.register.password-again'),
            trans('locale.auth.register.have-account')
        ]);

        $params = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'secret',
            'password-again' => 'secret'
        ];
    }

    public function testCreateNewAccountWithSuccess()
    {
        $params = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'secret',
            'password-again' => 'secret'
        ];

        $response = $this->post(route('register'), $params);

        $response
            ->assertStatus(302)
            ->assertRedirect(route('dashboard.home'));
    }
}
