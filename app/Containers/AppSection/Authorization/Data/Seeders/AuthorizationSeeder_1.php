<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Enums\Role;
use App\Containers\AppSection\Authorization\Models\Role as RoleModel;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

final class AuthorizationSeeder_1 extends ParentSeeder
{
    public function run(): void
    {
        foreach (array_keys(config('auth.guards')) as $guardName) {
            RoleModel::firstOrCreate(
                [
                    'name' => strtolower(Role::SUPER_ADMIN->value),
                    'guard_name' => $guardName,
                ],
                [
                    'display_name' => Role::SUPER_ADMIN->label(),
                    'description' => 'Administrator',
                ]
            );
        }
    }
}
