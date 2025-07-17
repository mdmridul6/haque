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
        // $permissions = [
        //     'User' => ['user.create', 'user.edit', 'user.delete', 'user.view'],
        //     'Role' => ['role.create', 'role.edit', 'role.delete', 'role.view'],
        //     'Post' => ['post.create', 'post.edit', 'post.delete', 'post.view'],
        //     'Comment' => ['comment.approve', 'comment.delete'],
        // ];



        $permissions = [
            'profile' => [
                "admin.profile.edit",
                "admin.profile.update",
            ],
            'dashboard' => [
                "admin.logout",
                "admin.dashboard",
            ],
            'permission' => [
                "admin.permission",
                "admin.permission.create",
                "admin.permission.store",
                "admin.permission.show",
                "admin.permission.edit",
                "admin.permission.update",
                "admin.permission.destroy",
            ],
            'roles' => [
                "admin.roles",
                "admin.roles.create",
                "admin.roles.store",
                "admin.roles.show",
                "admin.roles.edit",
                "admin.roles.update",
                "admin.roles.destroy",
            ],
            'user' => [
                "admin.user",
                "admin.user.create",
                "admin.user.store",
                "admin.user.show",
                "admin.user.edit",
                "admin.user.update",
                "admin.user.destroy",
                "admin.user.password",
            ],
            'home-content' => [
                "admin.home-content",
                "admin.home-content.store",
            ],
            'about-us-content' => [
                "admin.about-us-content",
                "admin.about-us-content.store",
            ],
            'banner' => [
                "admin.banner",
                "admin.banner.store",
            ],
            'offer' => [
                "admin.offer",
                "admin.offer.store.content",
                "admin.offer.store",
                "admin.offer.edit",
                "admin.offer.update",
                "admin.offer.destroy",
            ],
            'work-process' => [
                "admin.work-process",
                "admin.work-process.create",
                "admin.work-process.store",
                "admin.work-process.show",
                "admin.work-process.edit",
                "admin.work-process.update",
                "admin.work-process.destroy",
            ],
            'plan' => [
                "admin.plan",
                "admin.plan.create",
                "admin.plan.store",
                "admin.plan.show",
                "admin.plan.edit",
                "admin.plan.update",
                "admin.plan.destroy",
            ],
            'team' => [
                "admin.team",
                "admin.team.create",
                "admin.team.store",
                "admin.team.show",
                "admin.team.edit",
                "admin.team.update",
                "admin.team.destroy",
            ],
            'review' => [
                "admin.review",
                "admin.review.create",
                "admin.review.store",
                "admin.review.show",
                "admin.review.edit",
                "admin.review.update",
                "admin.review.destroy",
            ],
            'faq' => [
                "admin.faq",
                "admin.faq.create",
                "admin.faq.store",
                "admin.faq.show",
                "admin.faq.edit",
                "admin.faq.update",
                "admin.faq.destroy",
            ],
            'category' => [
                "admin.category",
                "admin.category.create",
                "admin.category.store",
                "admin.category.show",
                "admin.category.edit",
                "admin.category.update",
                "admin.category.destroy",
            ],
            'tag' => [
                "admin.tag",
                "admin.tag.create",
                "admin.tag.store",
                "admin.tag.show",
                "admin.tag.edit",
                "admin.tag.update",
                "admin.tag.destroy",
            ],
            'blog' => [
                "admin.blog",
                "admin.blog.create",
                "admin.blog.store",
                "admin.blog.show",
                "admin.blog.edit",
                "admin.blog.update",
                "admin.blog.destroy",
            ]
        ];




        foreach ($permissions as $group => $perms) {
            foreach ($perms as $perm) {
                Permission::firstOrCreate(['name' => $perm]);
            }
        }
    }
}
