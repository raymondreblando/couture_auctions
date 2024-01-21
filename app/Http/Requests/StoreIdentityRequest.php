<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIdentityRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_front' => ['required', 'image', 'mimes:png,jpg', 'max:1024'],
            'id_back' => ['required', 'image', 'mimes:png,jpg', 'max:1024'],
        ];
    }
}
