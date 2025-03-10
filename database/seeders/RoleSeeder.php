<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Create permissions if they don't exist
        $viewRecords = Permission::firstOrCreate(['name' => 'view-records']);
        $manageRecords = Permission::firstOrCreate(['name' => 'manage-records']);

        // ✅ Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $guestRole = Role::firstOrCreate(['name' => 'guest']);

        // ✅ Assign permissions to roles
        $adminRole->syncPermissions([$viewRecords, $manageRecords]); // Admin can manage & view
        $guestRole->syncPermissions([$viewRecords]); // Guest can only view

        // ✅ Create admin user if not exists
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin123'),
            ]
        );
        $adminUser->assignRole($adminRole);

        // ✅ Create data entry user if not exists
        $guestUser = User::firstOrCreate(
            ['email' => 'dataentryuser@email.com'],
            [
                'name' => 'Data Entry User',
                'password' => bcrypt('dataentryuser'),
            ]
        );
        $guestUser->assignRole($guestRole);
    }
}
