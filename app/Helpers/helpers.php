<?php

use App\Entities\User;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @return Authenticatable|User
 *
 * @extends \App\Entities\User
 */
function user(): Authenticatable|User
{
    return auth()->user();
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