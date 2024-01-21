<?php

namespace App\View\Components\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardV2 extends Component
{
    public function __construct(
        public Product $product,
        public ProductImage $productImage,
        public Category $category
    ){}

    public function render(): View|Closure|string
    {
        return view('components.product.card-v2');
    }
}
