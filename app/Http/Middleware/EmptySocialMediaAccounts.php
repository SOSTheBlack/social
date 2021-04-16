<?php

namespace App\Http\Middleware;

use App\Entities\Enterprise;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Class EmptySocialMediaAccounts.
 *
 * @package App\Http\Middleware
 */
class EmptySocialMediaAccounts
{
    /**
     * @const string
     */
    private const ROUTE_NAME_SOCIAL_MEDIA_ACCOUNTS = 'settings.social_medias.instagram.new';

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (! Route::currentRouteNamed(self::ROUTE_NAME_SOCIAL_MEDIA_ACCOUNTS) && Enterprise::listSocialMediaAccounts()->isEmpty()) {
            return redirect()->route(self::ROUTE_NAME_SOCIAL_MEDIA_ACCOUNTS);
        }

        return $next($request);
    }
}
