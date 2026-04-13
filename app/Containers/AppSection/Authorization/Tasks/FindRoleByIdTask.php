<?php

namespace App\Containers\AppSection\Authorization\Tasks;

use App\Containers\AppSection\Authorization\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Authorization\Models\Role;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Str;

final class FindRoleByIdTask extends ParentTask
{
    public function __construct(
        private readonly RoleRepository $repository,
    ) {
    }

    public function run(string|int $id): Role
    {
        return $this->repository->findOrFail($id);
    }
}
