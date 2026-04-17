<?php

namespace App\Containers\AppSection\Role\UI\WEB\Dashboard\Controllers;

use App\Containers\AppSection\Role\Actions\DeleteRoleAction;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class DestroyRoleController extends WebController
{
    public function __invoke(int $id, DeleteRoleAction $action): RedirectResponse
    {
        $action->run($id);

        return redirect()->route('dashboard.roles.index')->with('success', trans('dashboard.Role deleted successfully'));
    }
}
