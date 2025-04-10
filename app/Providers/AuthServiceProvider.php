<?php

namespace App\Providers;

use App\Models\Group;
use App\Policies\GroupPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Group::class => GroupPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-group', function ($user) {
            return $user->can_create_group == 1;
        });

        Gate::define('view-group', function ($user, \App\Models\Group $group) {
            return $user->id === $group->created_by;
        });
    }
}
