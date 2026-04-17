<?php

namespace App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Role\Actions\FindRoleByIdAction;
use App\Containers\AppSection\Role\Actions\UpdateRoleAction;
use App\Containers\AppSection\Authorization\Actions\SyncRolePermissionsAction;
use App\Containers\AppSection\Role\UI\WEB\Dashboard\Requests\UpdateRoleRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class UpdateRoleController extends WebController
{
    public function __invoke(int $id, UpdateRoleRequest $request, UpdateRoleAction $action, SyncRolePermissionsAction $syncPermissionsAction): RedirectResponse
    {
        $role = app(FindRoleByIdAction::class)->run($id);
        $action->run($role, $request->validated());

        if ($request->has('permissions') && $request->validated('permissions')) {
            $syncPermissionsAction->run($role->id, ...$request->validated('permissions'));
        } else {
            $syncPermissionsAction->run($role->id);
        }

        return redirect()->route('dashboard.roles.index')->with('success', trans('dashboard.Role updated successfully'));
    }
}
