<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Models\Role;
use App\Containers\AppSection\User\Actions\CreateAdminAction;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

final class SuperAdminSeeder_2 extends ParentSeeder
{
    public function run(CreateAdminAction $action): void
    {
        $userData = [
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'name' => 'Super Admin',
        ];

        // CreateAdminAction already assigns the SUPER_ADMIN role to all guards
        $user = $action->run($userData);

        // Optionally assign admin role for web guard only
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'web')->first();
        if ($adminRole) {
            $user->assignRole($adminRole);
        }
    }
}
