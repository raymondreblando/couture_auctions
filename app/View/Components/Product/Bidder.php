<?php

namespace App\View\Components\Product;

use App\Models\Profile;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Bidder extends Component
{
    public function __construct(
        public User $user,
        public ?Profile $profile = null,
        public int $rank,
        public float $bid
    ){}

    public function render(): View|Closure|string
    {
        return view('components.product.bidder');
    }
}
