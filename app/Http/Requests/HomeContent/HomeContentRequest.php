<?php

namespace App\Http\Requests\HomeContent;

use Illuminate\Foundation\Http\FormRequest;

class HomeContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'site_title' => 'required|string|max:255',
            'site_color' => 'required|string|max:10',
            'title_or_logo' => 'required|in:title,logo',
            'primary_phone' => 'required|string|max:20',
            'secondary_phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'support_email' => 'required|email|max:255',
            'support_phone' => 'nullable|string|max:20',
            'google_map_embed' => 'nullable|string',
            'facebook_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'faq_video_link' => 'required|url|max:255',
            'satisfied_customers' => 'required|integer|min:0',
            'years_of_experience' => 'required|integer|min:0',
            'projects_completed' => 'required|integer|min:0',
            'awards_won' => 'required|integer|min:0',
            'terms_and_conditions' => 'required|string',
            'privacy_policy' => 'required|string',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
