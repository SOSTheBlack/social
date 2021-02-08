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
