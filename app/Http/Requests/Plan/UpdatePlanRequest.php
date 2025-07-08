<?php

namespace App\Http\Requests\Plan;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
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
            "title" => ['required'],
            "price" => ['required', 'numeric'],
            "duration" => ['required'],
            "badge_icon" => ['required'],
            "button_text" => ['required'],
            "is_actived" => ['required', 'numeric'],
            "order_number" => ['required', 'numeric'],
            "features" => ['array'],
            "features.*" => ['required']
        ];
    }
}
