<?php

namespace App\View\Components\Category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryEmpty extends Component
{
    public function __construct(
        public string $title,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.category.category-empty');
    }
}
