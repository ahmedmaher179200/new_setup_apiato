<?php

namespace App\Containers\AppSection\Role\Tasks;

use App\Containers\AppSection\Role\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Role\Models\Role;
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
