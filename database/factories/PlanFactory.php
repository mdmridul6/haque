<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Plan::class;
    public function definition()
    {

        return [
            'title' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'duration' => '/Year',
            'badge_icon' => 'bi bi-bar-chart-line',
            'features' => ['Feature 1', 'Feature 2', 'Feature 3'],
            'button_text' => 'GET STARTED',
            // 'is_actived' => $this->faker->boolean(),
            'is_actived' => true,

            'order_number' => $this->faker->numberBetween(1, 10),
        ];
    }
}
