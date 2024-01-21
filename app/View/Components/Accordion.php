<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    public function __construct(
        public string $count,
        public string $question,
        public string $content,
        public ?string $className = null,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.accordion');
    }
}
