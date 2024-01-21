<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'product_image' => ['required', 'image', 'mimes:png,jpg,webp', 'max:1024'],
            'product_name' => ['required', 'unique:products,product_name', 'max:255'],
            'category_id' => ['required', 'max:26'],
            'subcategory_id' => ['required', 'max:26'],
            'starting_price' => ['required'],
            'bid_end_date' => ['required', 'date'],
            'product_description' => ['required', 'max:1000'],
        ];
    }
}
