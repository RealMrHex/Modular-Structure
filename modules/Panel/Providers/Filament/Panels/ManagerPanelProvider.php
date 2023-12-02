<?php

namespace Modules\Panel\Providers\Filament\Panels;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ManagerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('manager')
            ->path('manager')
            ->login()
            ->colors($this->colors())
            ->pages($this->pages())
            ->font('Dana-FaNum') // todo: use a local font
            ->widgets($this->widgets())
            ->middleware($this->middlewares())
            ->authMiddleware($this->middlewares(true))
            ->spa()
            ->discoverModulesResources()
            ->discoverModulesPages()
            ->discoverModulesWidgets()
            ->plugins($this->plugins())
        ;
    }

    /**
     * Get the plugins
     *
     * @return array
     */
    private function plugins(): array
    {
        return [
            FilamentShieldPlugin::make(),
        ];
    }

    #region Panel Configs

    /**
     * Get the colors
     *
     * @return array
     */
    private function colors(): array
    {
        return [
            'primary' => Color::Indigo,
        ];
    }

    /**
     * Get the pages
     *
     * @return array
     */
    private function pages(): array
    {
        return [
            Pages\Dashboard::class,
        ];
    }

    /**
     * Get the widgets
     *
     * @return array
     */
    private function widgets(): array
    {
        return [
            Widgets\AccountWidget::class,
        ];
    }

    /**
     * Get the middlewares
     *
     * @param bool $auth
     *
     * @return string[]
     */
    private function middlewares(bool $auth = false): array
    {
        return $auth
            ? [
                Authenticate::class,
            ]
            : [
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ];
    }

    #endregion
}
