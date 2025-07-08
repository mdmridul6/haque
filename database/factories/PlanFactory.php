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
            'title' => 'Regular',
            'price' => '29',
            'duration' => 'Monthly',
            'badge_icon' => 'bi bi-gear-fill fs-1',
            'features' => '',
            'button_text' => 'Get Started',
            'is_actived' => true,
            'order_number' => 1,
        ];
    }
}
