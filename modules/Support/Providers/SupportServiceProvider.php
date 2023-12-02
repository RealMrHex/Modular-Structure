<?php

namespace Modules\Support\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Support\Console\V1\Panic\Venus;

class SupportServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->commands(
            [
                Venus::class,
            ]
        );
    }
}
