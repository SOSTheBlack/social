<?php

namespace App\Observers\User\Resources;

use App\Entities\User;
use Creativeorange\Gravatar\Exceptions\InvalidEmailException;
use Illuminate\Support\Str;

/**
 * Class UserCreatedObserver
 *
 * @package App\Observers\User\Resources
 */
class UserCreatedObserver
{
    /**
     * @var User
     */
    private User $user;

    /**
     * UserCreatedObserver constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function saveGravatarInProfile()
    {
        try {
            $gravatar = app('gravatar');

            if (! $gravatar->has($this->user->email)) {
                throw new InvalidEmailException('email not linked to a gravatar');
            }

            $urlGravatar = $gravatar->get($this->user->email);
        } catch (InvalidEmailException $invalidEmailException) {
        } finally {
            $avatar = $urlGravatar ?? vsprintf('https://ui-avatars.com/api/?name=%s&format=svg', [Str::slug($this->user->name, '+')]);

            $this->user->profile()->updateOrCreate([], ['avatar' => $avatar]);
        }
    }
}
