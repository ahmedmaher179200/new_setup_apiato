<?php

namespace App\Containers\AppSection\Dashboard\Providers;

use App\Ship\Parents\Providers\ServiceProvider as ParentServiceProvider;

final class DashboardServiceProvider extends ParentServiceProvider
{
    public function boot(): void
    {
        $this->loadViews();
    }

    public function register(): void
    {
        //
    }

    protected function loadViews(): void
    {
        $viewsPath = realpath(__DIR__ . '/../UI/WEB/Views');

        $this->loadViewsFrom($viewsPath, 'Dashboard');
    }
}
