<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\FindRoleByIdTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class SyncRolePermissionsAction extends ParentAction
{
    public function __construct(
        private readonly FindRoleByIdTask $FindRoleByIdTask,
    ) {
    }

    public function run(int $roleId, int ...$permissionIds): Role
    {
        return $this->FindRoleByIdTask->run($roleId)
            ->syncPermissions($permissionIds);
    }
}
