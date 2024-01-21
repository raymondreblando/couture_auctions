<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'subcategory_name' => ['required', 'unique:sub_categories,subcategory_name', 'max:255']
        ];
    }
}
