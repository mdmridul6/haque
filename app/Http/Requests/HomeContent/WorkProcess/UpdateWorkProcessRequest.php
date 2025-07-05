<?php

namespace App\Http\Requests\HomeContent\WorkProcess;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkProcessRequest extends FormRequest
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
            "button_title"  => ['required'],
            "process_title" => ['required'],
            "process_description" => ['required'],
            "image" => ['image'],
            "type_1_title" => ['sometimes'],
            "type_1_sub_title" => ['required_with:type_1_title'],
            "type_2_title" => ['sometimes'],
            "type_2_sub_title" => ['required_with:type_2_title'],
            "type_3_title" => ['sometimes'],
            "type_3_sub_title" => ['required_with:type_3_title'],
        ];
    }
}
