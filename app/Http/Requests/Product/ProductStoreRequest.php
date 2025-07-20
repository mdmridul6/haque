<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "brand_id" => "required|string|exists:product_brands,id",
            "category_id" => "required|string|exists:product_categories,id",
            "price" => "required|numeric|min:0",
            "quantity" => "required|integer|min:1",
            "description" => "required|string|max:1000",
            "meta_title" => "required|string|max:60",
            "meta_description" => "required|string|max:255",
            "meta_keywords" => "required|string|max:255",
            "images" => "required|array",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }
}
