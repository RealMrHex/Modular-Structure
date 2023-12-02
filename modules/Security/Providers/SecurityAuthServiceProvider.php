<?php

namespace Modules\Security\Providers;


use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Modules\Security\Policies\V1\RolePolicy\RolePolicy;
use Spatie\Permission\Models\Role;

class SecurityAuthServiceProvider extends AuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
    ];

    public function boot(): void
    {
        Gate::before(function ($user, $ability, $arguments) {});
        Gate::after(function ($user, $ability, $result, $arguments) {});
    }
}
