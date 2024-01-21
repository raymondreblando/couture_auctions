<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Link extends Component
{
    public function __construct(
        public string $url,
        public string $icon,
        public string $title,
        public array $routes = []
    ){}

    public function render(): View|Closure|string
    {
        return view('components.sidebar.link');
    }

    public function isActive(): bool
    {
        return in_array(request()->route()->getName(), $this->routes);
    }
}
