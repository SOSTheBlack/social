<?php

namespace Tests\Feature\Auth;

use App\Entities\Profile;
use App\Entities\User;
use Database\Factories\Entities\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class RegisterTest
 *
 * @package Tests\Feature\Auth
 */
class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var User
     */
    private User $user;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = (new UserFactory())->create();
    }

    public function testIfCreateNewUserWithSuccess(): void
    {

    }
}
