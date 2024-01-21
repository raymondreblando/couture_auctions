<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => ['required', 'unique:categories,category_name', 'max:255']
        ];
    }
}
