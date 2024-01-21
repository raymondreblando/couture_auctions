<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetInTouchRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:get_in_touches,email'],
            'message' => ['required', 'max:1000'],
        ];
    }
}
