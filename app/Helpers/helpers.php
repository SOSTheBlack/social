<?php

use App\Entities\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @param  array  $with
 *
 * @return User
 *
 * @throws ModelNotFoundException
 *
 * @noinspection PhpIncompatibleReturnTypeInspection
 */
function user(array $with = []): User
{
    /** @var User $user */
    $user = auth()->user() ?? throw new RuntimeException('user not authenticated.');

    return User::with($with)->findOrFail($user->id);
}

/**
 * @param  string|array  $message
 * @param  string  $color
 * @param  bool  $exit
 *
 * @return void
 */
function alert_session(string|array $message, string $color = 'cyan', bool $exit = false): void
{
    session()->flash('alert', ['color' => $color, 'message' => $message, 'exit' => $exit]);
}

if (! function_exists('to_array')) {
    /**
     * @param  stdClass|array  $fooBar
     *
     * @return array
     */
    function to_array(stdClass|array $fooBar): array
    {
        return json_decode(json_encode($fooBar), true);
    }
}

if (! function_exists('to_object')) {
    /**
     * @param  stdClass|array  $fooBar
     *
     * @return array
     */
    function to_object(stdClass|array $fooBar): array
    {
        return json_decode(json_encode($fooBar), true);
    }
}