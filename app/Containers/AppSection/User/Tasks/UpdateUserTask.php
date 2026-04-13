<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class UpdateUserTask extends ParentTask
{
    public function __construct(
        private readonly UserRepository $repository,
    ) {
    }

    public function run(int $id, array $properties): User
    {
        $role = $properties['role'] ?? null;
        unset($properties['role']);

        // Don't update password if empty
        if (isset($properties['password']) && empty($properties['password'])) {
            unset($properties['password']);
        }

        $user = $this->repository->update($properties, $id);

        if ($role !== null) {
            $user->syncRoles([$role]);
        }

        return $user;
    }
}
