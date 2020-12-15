<?php

namespace Tests\Feature\Auth;

use App\Entities\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class LoginTest
 *
 * @package Tests\Feature\Auth
 */
class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testViewLoginWithSuccess()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);

        $response->assertSee([
            trans('locale.Email'),
            trans('locale.Password'),
            trans('locale.auth.login.form-title'),
            trans('locale.auth.login.remember-me'),
            trans('locale.auth.login.login'),
            trans('locale.auth.login.register-now'),
            trans('locale.auth.login.forgot-password'),
        ]);
    }

    public function testLoginWithSuccess()
    {
        /** @var User $user */
        $user = UserFactory::new()->create();

        $response = $this->post(route('login'), ['login' => $user->email, 'password' => 'secret']);
        $response
            ->assertStatus(302)
            ->assertRedirect(route('home'));
    }
}
