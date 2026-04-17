<?php

namespace App\Containers\AppSection\Role\Actions;

use App\Containers\AppSection\Role\Models\Role;
use App\Containers\AppSection\Role\Tasks\CreateRoleTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateRoleAction extends ParentAction
{
    public function __construct(
        private readonly CreateRoleTask $createRoleTask,
    ) {
    }

    public function run(array $data): Role
    {
        return $this->createRoleTask->run($data);
    }
}
