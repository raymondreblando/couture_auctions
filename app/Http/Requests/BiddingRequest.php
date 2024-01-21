<?php

namespace App\Http\Requests;

use App\Models\Product;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class BiddingRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required'],
            'amount' => [
                'required',
                function (string $attributae, string $value, Closure $fail) {
                    if ($value < $this->getProductStartingPrice()) {
                        $fail('validation.custom.amount.min_price')->translate();
                    }
                }
            ]
        ];
    }

    protected function getProductStartingPrice(): float
    {
        return (float) Product::where('product_id', $this->input('product_id'))
            ->value('starting_price');
    }
}
