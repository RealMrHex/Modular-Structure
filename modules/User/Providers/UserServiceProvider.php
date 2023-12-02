<?php

namespace Modules\User\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Modules\Crashlytic\Enums\V1\CrashLevel\CrashLevel;
use Modules\User\Contracts\V1\UserRepository\UserRepository;
use Modules\User\Observers\V1\User\UserObserver;
use Modules\User\Repositories\V1\UserRepository\UserEloquentRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerRepositories();
        $this->registerObservers();
    }

    /**
     * Register module repositories.
     */
    private function registerRepositories(): void
    {
        $this->app->bind(UserRepository::class, UserEloquentRepository::class);
    }

    /**
     * Register observers
     *
     * @return void
     */
    private function registerObservers(): void
    {
        v1_user()->model()::observe(UserObserver::class);
    }
}
