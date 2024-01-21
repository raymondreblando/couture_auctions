<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FilterMenu extends Component
{
    public function __construct(
        public Collection $categories,
        public Collection $subcategories
    ){}

    public function render(): View|Closure|string
    {
        return view('components.filter-menu');
    }
}
