<?php

namespace Tests\Unit\app\Observers;

use App\Entities\Profile;
use App\Entities\User;
use App\Observers\UserObserver;
use Database\Factories\Entities\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

/**
 * Class UserObserverTest
 *
 * @package Tests\Unit\app\Observers
 */
class UserObserverTest extends TestCase
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

    public function testIfCreateNewUserIsCreatedNewProfile()
    {
         [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ];
    }
}
