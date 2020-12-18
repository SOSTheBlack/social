<?php

namespace Tests\Unit\app\Observers;

use App\Entities\Profile;
use App\Entities\User;
use App\Observers\UserObserver;
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
        $user = new User([
            ''
        ]);
        $userObserver = new UserObserver();
    }
}
