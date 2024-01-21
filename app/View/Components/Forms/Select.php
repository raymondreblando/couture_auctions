<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{

    public function __construct(
        public string $name,
        public string $title,
        public object $options,
        public string $selected = '',
    ){}

    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }

    public function isSelected(string $value): bool
    {
        return $value === $this->selected;
    }
}
