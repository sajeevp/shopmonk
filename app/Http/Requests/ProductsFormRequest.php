<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsFormRequest extends FormRequest
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
            'name' => ['required', 'string'], 
            'category_id' => ['required', 'integer'],
            'color_id' => ['nullable', 'integer'],
            'size_id' => ['nullable', 'integer'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'regular_price' => ['required', 'integer'],
            'selling_price' => ['required', 'integer'],
            'stock_quantity' => ['required', 'integer'],
            'trending' => ['nullable', 'integer'],
            'status' => ['nullable', 'integer'],
            'featured' => ['nullable', 'integer'],
            'meta_title' => ['nullable', 'string'],
            'meta_keyword' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ];
    }
}
