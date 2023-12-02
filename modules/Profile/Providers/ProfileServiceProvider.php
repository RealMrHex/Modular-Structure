<?php

namespace Modules\Profile\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Profile\Contracts\V1\ProfileRepository\ProfileRepository;
use Modules\Profile\Repositories\V1\ProfileRepository\ProfileEloquentRepository;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerRepositories();
    }

    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->bind(ProfileRepository::class, ProfileEloquentRepository::class);
    }
}
