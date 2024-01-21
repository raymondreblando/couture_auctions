<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'username' => [
                'required', 
                'max:255',
                Rule::unique('users', 'username')->ignore($this->user()->user_id, 'user_id'),
            ],
            'email' => [
                'required', 
                'email', 
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user()->user_id, 'user_id'),
            ],
            'gender' => ['required', 'max:30'],
            'contact_number' => [
                'required', 
                'min:11', 
                'max:11',
                Rule::unique('users', 'contact_number')->ignore($this->user()->user_id, 'user_id'),
            ],
            'address' => ['required', 'max:255'],
        ];
    }
}
