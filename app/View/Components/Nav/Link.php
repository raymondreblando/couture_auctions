<?php

namespace App\View\Components\Nav;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    public function __construct(
        public string $url,
        public string $title,
        public array $routes,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.nav.link');
    }

    public function isActive(): bool
    {
        return in_array(request()->route()->getName(), $this->routes);
    }
}
