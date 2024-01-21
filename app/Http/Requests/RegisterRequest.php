<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'unique:users,username', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'gender' => ['required', 'max:30'],
            'contact_number' => ['required', 'min:11', 'max:11', 'unique:users,contact_number'],
            'address' => ['required', 'max:255'],
            'password' => ['required', 'max:255', 'confirmed'],
            'password_confirmation' => ['required'],
            'role_id' => ['nullable'],
            'is_verified' => ['nullable'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'role_id' => Role::user(),
            'is_verified' => 0,
        ]);
    }
}
