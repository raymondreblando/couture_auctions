<?php

namespace App\View\Components;

use App\Models\GetInTouch;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GetInTouchCard extends Component
{
    public function __construct(
        public GetInTouch $getInTouch
    ){}

    public function render(): View|Closure|string
    {
        return view('components.get-in-touch-card');
    }
}
