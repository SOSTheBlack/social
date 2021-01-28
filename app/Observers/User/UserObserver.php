<?php

namespace App\Observers\User;

use App\Entities\User;
use App\Observers\User\Resources\UserCreatedObserver;

/**
 * Class UserObserver
 *
 * @package App\Observers
 */
class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  User  $user
     *
     * @return void
     */
    public function created(User $user): void
    {
        $createdObserver = new UserCreatedObserver($user);

        $createdObserver->saveGravatarInProfile();
    }
}
