<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    public function __construct(
        public string $className,
        public string $title,
        public string $value,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.radio');
    }
}
