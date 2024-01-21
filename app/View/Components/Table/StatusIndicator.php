<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusIndicator extends Component
{
    public function __construct(
        public bool $isActive,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.table.status-indicator');
    }

    public function isUserActive(): string
    {
        return $this->isActive ? 'active' : 'block';
    }
}
