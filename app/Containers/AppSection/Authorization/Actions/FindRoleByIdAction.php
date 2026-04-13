<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\Authorization\Tasks\FindRoleByIdTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindRoleByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindRoleByIdTask $FindRoleByIdTask,
    ) {
    }

    public function run(int $id): Role
    {
        return $this->FindRoleByIdTask->run($id);
    }
}
