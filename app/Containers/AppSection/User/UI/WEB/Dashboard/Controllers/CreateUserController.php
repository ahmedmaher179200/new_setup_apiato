<?php

namespace App\Containers\AppSection\User\UI\WEB\Dashboard\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;

final class CreateUserController extends WebController
{
    public function __invoke(): View
    {
        if (!auth()->user()->can('users.create'))
            throw new AuthorizationException('Unauthorized');

        return view('appSection@user::create');
    }
}
