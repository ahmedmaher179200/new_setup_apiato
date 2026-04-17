<?php

namespace App\Containers\AppSection\Permission\Models;

use Apiato\Core\Models\InteractsWithApiato;
use Apiato\Http\Resources\ResourceKeyAware;
use Spatie\Permission\Models\Permission as SpatiePermission;

final class Permission extends SpatiePermission implements ResourceKeyAware
{
    use InteractsWithApiato;

    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
    ];
}
