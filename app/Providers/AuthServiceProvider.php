<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // check the user is admin
        Gate::define('is_admin', function ($user) {
            return $user->user_type === 'admin';
        });

        // check the user is client
        Gate::define('is_client', function ($user) {
            return $user->user_type === 'client';
        });

        // check the user is insider
        Gate::define('is_insider', function ($user) {
            return $user->user_type === 'insider';
        });

        // check the user is client is active
        Gate::define('is_client_active', function ($user) {
            return $user->user_type === 'client' && $user->is_active === 1;
        });

     

        // check the user is client
        Gate::define('is_clientOrAdmin', function ($user) {
            return $user->user_type === 'client' || $user->user_type === 'admin';
        });

        // check the user/client is activated
        Gate::define('is_active', function ($user) {
            return $user->is_active;
        });

        if(session()->has('locale') == false)
        {
            \App::setLocale('en');
        }
    }
}
