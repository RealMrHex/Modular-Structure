<?php

namespace Themes\Venus\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Livewire;
use ReflectionClass;
use Symfony\Component\Finder\SplFileInfo;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application service.
     */
    public function boot(): void
    {
        $this->registerThemeLivewireComponents(active_theme());
        $this->app->register(ThemeRouteServiceProvider::class);
    }

    /**
     * Register modules Livewire components.
     */
    private function registerThemeLivewireComponents(string $theme): void
    {
        $directory = base_path("themes/$theme/Livewire");
        $namespace = "Themes\\$theme\\Livewire";
        $alias = strtolower("$theme::");
        $this->registerComponentDirectory($directory, $namespace, $alias);
    }

    /**
     * Register component directory.
     */
    protected function registerComponentDirectory(string $directory, string $namespace, string $aliasPrefix = ''): void
    {
        $filesystem = new Filesystem();

        /**
         * Directory doesn't existS.
         */
        if (!$filesystem->isDirectory($directory))
        {
            return;
        }

        collect($filesystem->allFiles($directory))
            ->map(
                fn(SplFileInfo $file) => Str::of($namespace)
                                            ->append("\\{$file->getRelativePathname()}")
                                            ->replace(['/', '.php'], ['\\', ''])
                                            ->toString()
            )
            ->filter(fn($class) => (is_subclass_of($class, Component::class) && !(new ReflectionClass($class))->isAbstract()))
            ->each(fn($class) => $this->registerSingleComponent($class, $namespace, $aliasPrefix))
        ;
    }

    /**
     * Register livewire single component.
     */
    private function registerSingleComponent(string $class, string $namespace, string $aliasPrefix): void
    {
        $alias = $aliasPrefix . Str::of($class)
                                   ->after($namespace . '\\')
                                   ->replace(['/', '\\'], '.')
                                   ->explode('.')
                                   ->map([Str::class, 'kebab'])
                                   ->implode('.')
        ;

        Str::endsWith($class, ['\Index', '\index'])
            ? Livewire::component(Str::beforeLast($alias, '.index'), $class)
            : Livewire::component($alias, $class);
    }
}
