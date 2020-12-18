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

    /**
     * New User.
     *
     * @var User
     */
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = UserFactory::new()->create();
    }

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
        $response = $this->post(route('login'), ['login' => $this->user->email, 'password' => 'secret']);
        $response
            ->assertStatus(302)
            ->assertRedirect(route('dashboard.home'));
    }

    public function testIfGuestRedirectToLoginAccessRestrictPage()
    {
        $response = $this->get(route('dashboard.home'));

        $response
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testIfAuthenticatedRedirectToHome()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('login'));

        $response
            ->assertStatus(302)
            ->assertRedirect(route('dashboard.home'));
    }

    public function testUserAuthenticatedExecuteLogout()
    {
        $this->actingAs($this->user);

        $this->get(route('auth.logout'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('dashboard.home'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
