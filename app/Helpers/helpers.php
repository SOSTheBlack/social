<?php

use App\Entities\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @param  array  $with
 *
 * @return User|Model
 *
 * @throws ModelNotFoundException
 */
function user(array $with = []): User|Model
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