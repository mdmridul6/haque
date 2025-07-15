<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */


class BlogFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => Blog::slugify($this->faker->unique()->sentence),
            'category_id' => Category::factory(),
            'content' => $this->faker->paragraphs(3, true),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => Tag::factory()->count(3)->create()->pluck('name')->implode(', '),
            'image' => $this->faker->imageUrl(640, 480, 'blog', true),
        ];
    }
}
