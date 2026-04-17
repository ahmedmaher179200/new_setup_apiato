<?php

namespace App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Authorization\Actions\ListPermissionsAction;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;

final class CreateRoleController extends WebController
{
    public function __invoke(ListPermissionsAction $listPermissionsAction): View
    {
        if (!auth()->user()->can('roles.create'))
            throw new AuthorizationException('Unauthorized');

        $permissions = $listPermissionsAction->run();

        return view('Role::create', compact('permissions'));
    }
}
