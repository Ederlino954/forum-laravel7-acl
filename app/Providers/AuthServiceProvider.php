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
        'App\Thread' => 'App\Policies\ThreadPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-index-thread', function($user){
            // var_dump($user);
            // return true;
            return $user->isAdmin();
        });

        // Gate::define('access-index-thread', function($user){
        //     // return true;
        //     return false;
        // });
    }
}
