<?php

namespace App\View\Components\Nav;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\View\Component;

class Notification extends Component
{
    public function __construct(
        public array $classNames,
        public User $user,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.nav.notification');
    }
}
