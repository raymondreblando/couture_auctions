<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HistoryCard extends Component
{
    public function __construct(
        public Product $product,
        public Category $category,
        public ProductImage $productImage,
        public int $rank
    ){}

    public function render(): View|Closure|string
    {
        return view('components.history-card');
    }
}
