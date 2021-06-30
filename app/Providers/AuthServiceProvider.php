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
        'App\Models\Teacher' => 'App\Policies\EditPolicy',
        'App\Models\Classes' => 'App\Policies\EditPolicy',
        'App\Models\ClassRoom' => 'App\Policies\EditPolicy',
        'App\Models\Imparts' => 'App\Policies\EditPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create', function($user) {
            foreach ($user->roles as $role) {
                if($role->name === 'create')
                    return true;
            }
            return false;
        });
    }
}
