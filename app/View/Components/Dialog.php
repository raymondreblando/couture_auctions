<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dialog extends Component
{
    public function __construct(
        public string $id,
        public string $heading,
        public string $message,
        public string $selector,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.dialog');
    }
}
