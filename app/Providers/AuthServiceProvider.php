<?php

namespace App\Providers;

use Illuminate\Auth\Access\Gate as AccessGate;
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


        $resources = \App\Resource::all();
        // dd( $resources);

        Gate::before(function($user){
            if ($user->isAdmin()){
                return true;
            }
            // dd( $user);
        });

        foreach ($resources as $resource) {
            // dd( $resource);

            Gate::define($resource->resource, function($user) use ($resource){
                // dd($resource);
                return $resource->roles->contains($user->role);
            });
        }

        // dd(Gate::abilities()); // abilities retorn as permissões disponíveis

        // Gate::define('access-index-thread', function($user){
        //     // return true;
        //     return false;
        // });
    }
}
