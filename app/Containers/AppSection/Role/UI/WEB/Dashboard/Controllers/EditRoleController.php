<?php

namespace App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Role\Actions\FindRoleByIdAction;
use App\Containers\AppSection\Authorization\Actions\ListPermissionsAction;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;

final class EditRoleController extends WebController
{
    public function __invoke(int $id, FindRoleByIdAction $action, ListPermissionsAction $listPermissionsAction): View
    {
        if (!auth()->user()->can('roles.update'))
            throw new AuthorizationException('Unauthorized');

        $data = $action->run($id);
        $permissions = $listPermissionsAction->run();

        return view('Role::edit', compact('data', 'permissions'));
    }
}
