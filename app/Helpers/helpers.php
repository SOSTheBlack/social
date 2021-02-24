<?php

use App\Entities\User;
use Illuminate\Contracts\Auth\Authenticatable;
use JetBrains\PhpStorm\Pure;

/**
 * @return Authenticatable|User
 *
 * @extends \App\Entities\User
 */
function user(): Authenticatable|User
{
    return auth()->user();
}

function instaGenerateCsrfToken()
{
    return md5(uniqid());
}

function instaGeneratePasswordHash(string $password)
{
    return vsprintf('#PWD_INSTAGRAM_BROWSER:0:'.time().':%s', [$password]);
}
