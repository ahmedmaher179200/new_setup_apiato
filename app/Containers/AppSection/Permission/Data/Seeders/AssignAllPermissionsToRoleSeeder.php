<?php

namespace App\Containers\AppSection\Permission\Data\Seeders;

use App\Containers\AppSection\Permission\Models\Permission;
use App\Containers\AppSection\Authorization\Models\Role;
use Illuminate\Database\Seeder;

final class AssignAllPermissionsToRoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::where('guard_name', 'web')->get();

        if ($roles->isEmpty()) {
            $this->command->warn('No roles found. Please create roles first.');
            return;
        }

        $this->command->info('Available Roles:');
        $roles->each(function ($role, $index) {
            $this->command->line(($index + 1) . '. ' . $role->name);
        });

        $selectedIndex = (int) $this->command->ask('Select role number to assign all permissions') - 1;

        if (!isset($roles[$selectedIndex])) {
            $this->command->error('Invalid selection.');
            return;
        }

        $role = $roles[$selectedIndex];
        $permissions = Permission::where('guard_name', $role->guard_name)->pluck('id')->toArray();

        $role->syncPermissions($permissions);

        $this->command->info("All permissions assigned to role '{$role->name}' successfully!");
    }
}
