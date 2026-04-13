<?php

namespace App\Containers\AppSection\Role\Data\Repositories;

use App\Containers\AppSection\Role\Models\Role;
use App\Ship\Parents\Repositories\Repository;

final class RoleRepository extends Repository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function whereGuard(string $guard): self
    {
        $this->model = $this->model->where('guard_name', $guard);
        return $this;
    }
}
