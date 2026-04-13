<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Ship\Parents\Tasks\Task;

final class UpdateRoleTask extends Task
{
    public function __construct(
        private readonly RoleRepository $repository,
    ) {
    }

    public function run(Role $role, array $data): Role
    {
        $role->update($data);
        return $role;
    }
}
