<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'User' => ['user.create', 'user.edit', 'user.delete', 'user.view'],
            'Role' => ['role.create', 'role.edit', 'role.delete', 'role.view'],
            'Post' => ['post.create', 'post.edit', 'post.delete', 'post.view'],
            'Comment' => ['comment.approve', 'comment.delete'],
        ];

        foreach ($permissions as $group => $perms) {
            foreach ($perms as $perm) {
                Permission::firstOrCreate(['name' => $perm]);
            }
        }
    }
}
