<?php

namespace App\Providers;

use App\Entities\User;
use App\Observers\User\UserObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider
 *
 * @package App\Providers
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
