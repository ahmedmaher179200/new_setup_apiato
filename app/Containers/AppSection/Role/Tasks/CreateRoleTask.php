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

    public function run(string $name, string|null $description = null, string|null $displayName = null): Role
    {
        return $this->repository->create([
            'name' => $name,
            'guard_name' => auth()->activeGuard(),
            'display_name' => $displayName,
            'description' => $description,
        ]);
    }
}
