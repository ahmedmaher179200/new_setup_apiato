<?php

namespace App\Containers\AppSection\Role\Providers;

use App\Ship\Parents\Providers\ServiceProvider as ParentServiceProvider;

final class RoleServiceProvider extends ParentServiceProvider
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
        $viewsPath = realpath(__DIR__ . '/../UI/WEB/Dashboard/Views');

        $this->loadViewsFrom($viewsPath, 'Role');
    }
}
