<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetInTouchReplyRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reply' => ['required', 'max:2000'],
        ];
    }
}
