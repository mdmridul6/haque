<?php

namespace Database\Factories;

use App\Models\ProductBrand;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' =>ProductCategory::factory(),
            'brand_id' =>ProductBrand::factory(),
            'quantity' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->boolean,
            'meta_title' => $this->faker->words(3, true),
            'meta_description' => $this->faker->words(3, true),
            'meta_keywords' => $this->faker->words(3, true),
        ];
    }
}
