<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_color',
        'title_or_logo',
        'site_title',
        'primary_phone',
        'secondary_phone',
        'email',
        'address',
        'support_email',
        'support_phone',
        'google_map_embed',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'faq_video_link',
        'satisfied_customers',
        'years_of_experience',
        'projects_completed',
        'awards_won',
        'terms_and_conditions',
        'privacy_policy',
        'site_logo'
    ];
}
