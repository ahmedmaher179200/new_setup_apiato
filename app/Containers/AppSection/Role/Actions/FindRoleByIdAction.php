<?php

namespace App\Containers\AppSection\Role\Actions;

use App\Containers\AppSection\Role\Models\Role;
use App\Containers\AppSection\Role\Tasks\FindRoleTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindRoleByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindRoleTask $findRoleTask,
    ) {
    }

    public function run(int $id): Role
    {
        return $this->findRoleTask->run($id);
    }
}
