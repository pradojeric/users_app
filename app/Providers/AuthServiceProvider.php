<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user){
            return $user->hasRole('superadmin') ? true : null;
        });

        Gate::define('superadmin', function($user){
            return $user->hasRole('superadmin');
        });

        Gate::define('admin', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('employee', function($user){
            return $user->hasRole('employee');
        });

        Gate::define('student', function($user){
            return $user->hasRole('student');
        });

        // if (! $this->app->routesAreCached()) {
        //     Passport::routes();
        // }

        // Passport::loadKeysFrom(storage_path());

        // Passport::tokensExpireIn(now()->addDays(15));
        // Passport::refreshTokensExpireIn(now()->addDays(30));
        // Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
