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
 * @return string
 */
function instaGenerateCsrfToken(): string
{
    return md5(uniqid());
}

/**
 * @param  string  $password
 *
 * @return string
 */
function instaGeneratePasswordHash(string $password): string
{
    return vsprintf('#PWD_INSTAGRAM_BROWSER:0:'.time().':%s', [$password]);
}

/**
 * @param  string  $color
 * @param  string  $message
 * @param  bool  $exit
 *
 * @return void
 */
function alertSession(string $message, string $color = 'cyan', bool $exit = true): void
{
    session()->flash('alert', ['color' => $color, 'message' => $message, 'exit' => $exit]);
}