<?php

namespace App\Http\Requests\HomeContent\OfferContent;

use Illuminate\Foundation\Http\FormRequest;

class OfferContentUpdateRequest extends FormRequest
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
            'offer_title' => 'required',
            'offer_subtitle' => 'required',
        ];
    }
}
