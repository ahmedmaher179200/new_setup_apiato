<?php

namespace App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Role\Actions\CreateRoleAction;
use App\Containers\AppSection\Authorization\Actions\SyncRolePermissionsAction;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Requests\CreateRoleRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class StoreRoleController extends WebController
{
    public function __invoke(CreateRoleRequest $request, CreateRoleAction $action, SyncRolePermissionsAction $syncPermissionsAction): RedirectResponse
    {
        $role = $action->run($request->validated());

        if ($request->has('permissions') && $request->validated('permissions')) {
            $syncPermissionsAction->run($role->id, ...$request->validated('permissions'));
        }

        return redirect()->route('dashboard.roles.index')->with('success', trans('dashboard.Role created successfully'));
    }
}
