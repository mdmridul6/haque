<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);


        // Get all permissions
        $allPermissions = Permission::all();

        // Assign all permissions to admin
        $admin->syncPermissions($allPermissions);
    }
}
