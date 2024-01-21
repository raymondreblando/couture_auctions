<?php

namespace App\View\Components\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductDetailsCard extends Component
{
    public function __construct(
        public Product $product,
        public Category $category,
        public ProductImage $productImage
    ){}

    public function render(): View|Closure|string
    {
        return view('components.product.product-details-card');
    }
}
