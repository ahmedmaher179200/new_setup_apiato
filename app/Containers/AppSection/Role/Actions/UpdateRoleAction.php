<?php

namespace App\Containers\AppSection\Role\Actions;

use App\Containers\AppSection\Role\Models\Role;
use App\Containers\AppSection\Role\Tasks\UpdateRoleTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateRoleAction extends ParentAction
{
    public function __construct(
        private readonly UpdateRoleTask $updateRoleTask,
    ) {
    }

    public function run(Role $role, array $data): Role
    {
        return $this->updateRoleTask->run($role, $data);
    }
}
