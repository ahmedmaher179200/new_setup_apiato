<?php

namespace App\Containers\AppSection\User\Providers;

use App\Ship\Parents\Providers\ServiceProvider as ParentServiceProvider;
use Illuminate\Validation\Rules\Password;

final class UserServiceProvider extends ParentServiceProvider
{
    public function boot(): void
    {
        $this->loadViews();
        Password::defaults(static fn () => Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols());
    }

    public function register(): void
    {
        //
    }

    protected function loadViews(): void
    {
        $viewsPath = realpath(__DIR__ . '/../UI/WEB/Dashboard/Views');

        $this->loadViewsFrom($viewsPath, 'appSection@user');
    }
}
