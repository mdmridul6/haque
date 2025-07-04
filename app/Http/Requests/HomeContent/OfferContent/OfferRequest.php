<?php

namespace App\Http\Requests\HomeContent\OfferContent;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            "order_number" => ['required', 'numeric'],
            "title" => ['required', 'max:40'],
            "sub_title" => ['required', 'max:90'],
            "icon" => ['required'],
        ];
    }
}
