<?php

namespace App\Observers\User\Resources;

use App\Entities\User;
use Creativeorange\Gravatar\Exceptions\InvalidEmailException;
use Illuminate\Support\Str;
use Throwable;

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

    /**
     * Create the avatar for new profile.
     *
     * @return void
     */
    public function saveGravatarInProfile(): void
    {
        try {
            $gravatar = app('gravatar');

            if (! $gravatar->has($this->user->email)) {
                throw new InvalidEmailException('email not linked to a gravatar');
            }

            $avatar = $gravatar->get($this->user->email);
        } catch (InvalidEmailException $invalidEmailException) {
            $avatar = vsprintf('https://ui-avatars.com/api/?name=%s&format=svg', [Str::slug($this->user->name, '+')]);
        } catch (Throwable $exception) {
            $avatar = asset('/images/avatar/avatar-0.png', true);
        } finally {
            $this->user->profile()->updateOrCreate([], ['avatar' => $avatar]);
        }
    }
}
