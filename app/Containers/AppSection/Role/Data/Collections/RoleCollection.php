<?php

namespace App\Containers\AppSection\Role\Data\Collections;

use App\Containers\AppSection\Role\Models\Role;
use App\Ship\Parents\Collections\EloquentCollection as ParentCollection;

/**
 * @extends ParentCollection<array-key, Role>
 */
final class RoleCollection extends ParentCollection
{
}
