<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Ship\Parents\Actions\Action;

final class CreateUserAction extends Action
{
    public function __construct(
        private readonly CreateUserTask $createUserTask,
    ) {}

    public function run(array $data): User
    {
        return $this->createUserTask->run($data);
    }
}
