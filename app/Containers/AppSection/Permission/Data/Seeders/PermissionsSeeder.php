<?php

namespace App\Containers\AppSection\Permission\Data\Seeders;

use App\Containers\AppSection\Permission\Models\Permission;
use Illuminate\Database\Seeder;

final class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $config = config('appSection-permission.permissions');
        $guards = ['web', 'api'];

        foreach ($guards as $guard) {
            foreach ($config as $model => $actions) {
                foreach ($actions as $action) {
                    $permissionName = "{$model}.{$action}";

                    Permission::firstOrCreate(
                        ['name' => $permissionName, 'guard_name' => $guard],
                        [
                            'display_name' => $this->formatDisplayName($model, $action),
                            'description' => $this->formatDescription($model, $action),
                        ]
                    );
                }
            }
        }
    }

    private function formatDisplayName(string $model, string $action): string
    {
        return ucfirst($action) . ' ' . ucfirst($model);
    }

    private function formatDescription(string $model, string $action): string
    {
        return ucfirst($action) . ' ' . strtolower($model) . ' record(s)';
    }
}
