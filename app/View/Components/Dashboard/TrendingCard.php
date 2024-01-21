<?php

namespace App\View\Components\Dashboard;

use App\Models\Product;
use App\Models\Profile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrendingCard extends Component
{
    public function __construct(
        public Product $product,
        public string $category,
        public string $image,
        public object $bids,
        public int $count,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.dashboard.trending-card');
    }
}
