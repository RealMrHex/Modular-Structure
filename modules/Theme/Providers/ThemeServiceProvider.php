<?php

namespace Modules\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Qirolab\Theme\Theme;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Parent theme.
     *
     * @var string
     */
    private string $parent;

    /**
     * Active theme.
     *
     * @var string
     */
    private string $active;

    /**
     * Bootstrap any application config.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->syncTheme();
        $this->registerTheme();
    }

    /**
     * Sync current application theme.
     *
     * @return void
     */
    private function syncTheme(): void
    {
        $this->active = config('v1.theme.config.active', 'Venus');
        $this->parent = config('v1.theme.config.parent', 'Venus');
        Theme::set($this->active, $this->parent);
    }

    /**
     * Register current theme.
     *
     * @return void
     */
    private function registerTheme(): void
    {
        //Registering theme providers.
        $provider = "Themes\%s\Providers\ThemeServiceProvider";
        $activeProvider = sprintf($provider, $this->active);
        $parentProvider = sprintf($provider, $this->parent);

        //Register active theme provider
        if (class_exists($activeProvider))
        {
            $this->app->register($activeProvider);
        }

        //Register parent theme provider
        if ($this->active !== $this->parent && class_exists($parentProvider))
        {
            $this->app->register($parentProvider);
        }
    }
}
