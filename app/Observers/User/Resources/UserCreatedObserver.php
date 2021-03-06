<?php

namespace App\Observers\User\Resources;

use App\Entities\User;
use Creativeorange\Gravatar\Exceptions\InvalidEmailException;
use Illuminate\Support\Facades\DB;
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
     * @var DB
     */
    private DB $db;

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

            if (! $gravatar->exists($this->user->email)) {
                throw new InvalidEmailException('email not linked to a gravatar');
            }

            $avatar = $gravatar->get($this->user->email);
        } catch (InvalidEmailException $invalidEmailException) {
            $avatar = vsprintf('https://ui-avatars.com/api/?name=%s&format=svg', [Str::slug($this->user->name, '+')]);
        } catch (Throwable $exception) {
            $avatar = asset('/images/avatar/avatar-0.png', true);
        } finally {
            $this->user->profile()->updateOrCreate(['user_id' => $this->user->id], ['avatar' => $avatar]);
        }
    }

    /**
     * Create a new enterprise for new user
     *
     * @return void
     */
    public function createEnterprise(): void
    {
        $prefixName = 'LTDA';
        $enterpriseName = vsprintf('%s %s', [Str::title($this->user->name), $prefixName]);

        $this->user->enterprises()->updateOrCreate(['user_id' => $this->user->id], ['name' => $enterpriseName]);
    }
}
