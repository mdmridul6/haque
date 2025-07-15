<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory()->count(10)->create()->each(function ($blog) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $blog->tags()->attach($tags);
        });
    }
}
