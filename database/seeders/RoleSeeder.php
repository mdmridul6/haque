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
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $viewer = Role::firstOrCreate(['name' => 'viewer']);

        // Get all permissions
        $allPermissions = Permission::all();

        // Assign all permissions to admin
        $admin->syncPermissions($allPermissions);

        // Assign post & comment permissions to editor
        $editorPermissions = $allPermissions->filter(function ($perm) {
            return str_starts_with($perm->name, 'post.') || str_starts_with($perm->name, 'comment.');
        });
        $editor->syncPermissions($editorPermissions);

        // Viewer only gets view permissions
        $viewerPermissions = $allPermissions->filter(function ($perm) {
            return str_ends_with($perm->name, '.view');
        });
        $viewer->syncPermissions($viewerPermissions);
    }
}
