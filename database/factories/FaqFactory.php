<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Faq::class;
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(),
            'order' => $this->faker->numberBetween(0, 100),
        ];
    }
}
