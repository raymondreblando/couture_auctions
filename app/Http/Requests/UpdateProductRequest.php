<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (! $this->user()->isAdmin()) {
            return false;
        }

        return true;
    }

    public function rules(): array
    {
        return [
            'product_image' => ['sometimes', 'nullable', 'image', 'mimes:png,jpg,webp', 'max:1024'],
            'product_name' => [
                'required', 
                'max:255', 
                Rule::unique('products', 'product_name')->ignore($this->route('product'), 'product_id')
            ],
            'category_id' => ['required', 'max:26'],
            'subcategory_id' => ['required', 'max:26'],
            'starting_price' => ['required'],
            'bid_end_date' => ['required', 'date'],
            'product_description' => ['required', 'max:1000'],
        ];
    }
}
