<?php

use App\Entities\User;
use App\Repositories\Contracts\UserRepository;

/**
 * @param  array  $with
 * @return array
 *
 * @extends \App\Entities\User
 */
function user(array $with = []): array
{
    /** @var User $user */
    $user = auth()->user() ?? throw new RuntimeException('user not authenticated.');

    return app(UserRepository::class)->with($with)->findOrFail($user->id);
}

/**
 * @param  string|array  $message
 * @param  string  $color
 * @param  bool  $exit
 *
 * @return void
 */
function alertSession(string|array $message, string $color = 'cyan', bool $exit = false): void
{
    session()->flash('alert', ['color' => $color, 'message' => $message, 'exit' => $exit]);
}

/**
 * @return string
 */
function separator(): string
{
    return ' ';
}