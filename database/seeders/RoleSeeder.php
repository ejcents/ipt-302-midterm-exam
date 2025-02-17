<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $manageUsers = Permission::create(['name' => 'manage-user']);
        $manageAccounts = Permission::create(['name' => 'manage-accounts']);
        $manageTransactions = Permission::create(['name' => 'manage-transactions']);
        $manageProducts = Permission::create(['name' => 'manage-products']);

        $adminRole = Role::create(['name' => 'admin']);
        $accountManagerRole = Role::create(['name' => 'account-manager']);
        $tellerRole = Role::create(['name' => 'teller']);
        $productRole = Role::create(['name' => 'product']);

        $adminRole->givePermissionTo([$manageUsers, $manageAccounts, $manageTransactions]);
        $accountManagerRole->givePermissionTo([$manageAccounts, $manageTransactions]);
        $tellerRole->givePermissionTo($manageTransactions);
        $productRole->givePermissionTo($manageProducts);

        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin111'),
        ]);

        $centillase = User::create([
            'name' => 'Efren Jacob',
            'email' => 'ejcentillas@email.com',
            'password' => bcrypt('ejcentillas'),
        ]);
        
        $guestUser = User::create([
            'name' => 'Guest Account',
            'email' => 'guest@email.com',
            'password' => bcrypt('guest123'),
        ]);

        $adminUser->assignRole($adminRole);
        $centillase->assignRole($adminRole);
        $guestUser->assignRole($productRole);


    }
}
