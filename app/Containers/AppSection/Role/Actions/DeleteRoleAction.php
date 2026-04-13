<?php

namespace App\Containers\AppSection\Role\Actions;

use App\Containers\AppSection\Role\Data\Repositories\RoleRepository;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteRoleAction extends ParentAction
{
    public function __construct(
        private readonly RoleRepository $repository,
    ) {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
