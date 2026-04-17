<?php

namespace App\Containers\AppSection\Role\Tasks;

use App\Containers\AppSection\Role\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Role\Models\Role;
use App\Ship\Parents\Tasks\Task;

final class CreateRoleTask extends Task
{
    public function __construct(
        private readonly RoleRepository $repository,
    ) {
    }

    public function run(array $data): Role
    {
        // Remove permissions as it's handled separately by syncPermissions
        unset($data['permissions']);

        $data['name'] = strtolower($data['name'] ?? '');
        $data['guard_name'] = $data['guard_name'] ?? auth()->activeGuard();

        return $this->repository->create($data);
    }
}
