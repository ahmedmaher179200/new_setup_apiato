<?php

namespace App\Containers\AppSection\Role\Actions;

use App\Containers\AppSection\Role\Data\Repositories\RoleRepository;
use App\Containers\AppSection\Role\Exceptions\FailedToDeleteRole;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteRoleAction extends ParentAction
{
    public function __construct(
        private readonly RoleRepository $repository,
    ) {
    }

    public function run(int $id): bool
    {
        // Prevent deletion of the first system role (id = 1)
        if ($id === 1) {
            throw FailedToDeleteRole::becauseCannotDeleteSystemRole();
        }

        return $this->repository->delete($id);
    }
}
