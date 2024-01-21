<?php

namespace App\View\Components\Dashboard;

use App\Models\Profile;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopBidder extends Component
{
    public function __construct(
        public User $user,
        public ?Profile $profile = null,
        public string $amount,
        public int $count
    ){}

    public function render(): View|Closure|string
    {
        return view('components.dashboard.top-bidder');
    }
}
