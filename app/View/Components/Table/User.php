<?php

namespace App\View\Components\Table;

use App\Models\Profile;
use App\Models\User as UserModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class User extends Component
{
    public function __construct(
        public UserModel $user,
        public ?Profile $profile = null,
    ){}

    public function render(): View|Closure|string
    {
        return view('components.table.user');
    }
}
