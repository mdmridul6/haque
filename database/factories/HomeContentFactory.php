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
            'offer_title' => 'What we Offer',
            'offer_subtitle' => 'Understanding the easy to use process',
            'primary_phone' => '123-456-7890',
            'secondary_phone' => '098-765-4321',
            'email' => 'info@example.com',
            'address' => '123 Main Street, City, Country',
            'support_email' => 'support@example.com',
            'support_phone' => '123-456-7890',
            'google_map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509123!2d144.9537363153165!3d-37.81627997975144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11b8b7%3A0x5045675218ce6e0!2sMelbourne%20CBD%2C%20Victoria%2C%20Australia!5e0!3m2!1sen!2sin!4v1616161616161" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'facebook_link' => 'https://www.facebook.com/yourpage',
            'twitter_link' => 'https://www.twitter.com/yourpage',
            'instagram_link' => 'https://www.instagram.com/yourpage',
            'linkedin_link' => 'https://www.linkedin.com/yourpage',
            'faq_video_link' => 'https://www.youtube.com/watch?v=example',
            'satisfied_customers' => 2500,
            'years_of_experience' => 5,
            'projects_completed' => 100,
            'awards_won' => 10,

        ];
    }
}
