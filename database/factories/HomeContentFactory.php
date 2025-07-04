<?php

namespace Database\Factories;

use App\Models\HomeContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeContent>
 */
class HomeContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = HomeContent::class;
    public function definition()
    {
        return [
            'site_title' => 'Site Title',
            'site_logo' => 'frontend/assets/img/logo.png',
            'title_or_logo' => 'logo',
            'site_color' => '#ff5a6e',
            'banner_title' => 'Get your free 2 weeks trial right here',
            'banner_subtitle' => 'Celebrated delightful an especially increasing instrument am. Indulgence contrastedsufficient to unpleasant in in insensible favourable.',
            'youtube_video_url' => 'https://www.youtube.com/watch?v=owhuBrGIOsE',
            'banner_image' => 'frontend/assets/img/2440x1578.png',
            'about_us_title' => 'We\'re Trusted by 2500+ Loyal Customer',
            'about_us_subtitle' => 'Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.',

        ];
    }
}
