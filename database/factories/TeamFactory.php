<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Team::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'designation' => $this->faker->jobTitle(),
            'image' => 'frontend/assets/img/800x800.png',
            'facebook_link' => $this->faker->url(),
            'linkedin_link' => $this->faker->url(),
            'twitter_link' => $this->faker->url(),
            'instagram_link' => $this->faker->url(),
        ];
    }
}
