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
        $viewRecords = Permission::firstOrCreate(['name' => 'view-records']);
        $manageRecords = Permission::firstOrCreate(['name' => 'manage-records']);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $guestRole = Role::firstOrCreate(['name' => 'guest']);

        $adminRole->syncPermissions([$viewRecords, $manageRecords]); 
        $guestRole->syncPermissions([$viewRecords]); 

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@email.com'],
            
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin123'),
            ]
        );
        $adminUser->assignRole($adminRole);

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
