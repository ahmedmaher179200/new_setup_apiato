<?php

namespace App\Containers\AppSection\Role\Models;

use Apiato\Core\Models\InteractsWithApiato;
use Apiato\Http\Resources\ResourceKeyAware;
use App\Containers\AppSection\Role\Data\Collections\RoleCollection;
use Spatie\Permission\Models\Role as SpatieRole;

final class Role extends SpatieRole implements ResourceKeyAware
{
    use InteractsWithApiato;

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
    ];

    public function newCollection(array $models = []): RoleCollection
    {
        return new RoleCollection($models);
    }
}
