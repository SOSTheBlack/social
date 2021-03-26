<?php

namespace App\Providers;

use App\Repositories\Contracts\EnterpriseRepository;
use App\Repositories\Contracts\EnterpriseUserRepository;
use App\Repositories\Contracts\ProfileRepository;
use App\Repositories\Contracts\SocialMediaAccountRepository;
use App\Repositories\Contracts\SocialMediaRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\EnterpriseRepositoryEloquent;
use App\Repositories\EnterpriseUserRepositoryEloquent;
use App\Repositories\ProfileRepositoryEloquent;
use App\Repositories\SocialMediaAccountRepositoryEloquent;
use App\Repositories\SocialMediaRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 *
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        #TODO: criar um auto loar para os repositories.
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(ProfileRepository::class, ProfileRepositoryEloquent::class);
        $this->app->bind(EnterpriseRepository::class, EnterpriseRepositoryEloquent::class);
        $this->app->bind(SocialMediaRepository::class, SocialMediaRepositoryEloquent::class);
        $this->app->bind(SocialMediaAccountRepository::class, SocialMediaAccountRepositoryEloquent::class);
        $this->app->bind(EnterpriseUserRepository::class, EnterpriseUserRepositoryEloquent::class);
        $this->app->bind(SocialMediaAccountRepository::class, SocialMediaAccountRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
