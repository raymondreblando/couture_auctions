<?php

namespace App\Policies;

use App\Helpers\DateHelper;
use App\Models\Bid;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BidPolicy
{
    public function create(User $user): bool
    {
        return $user->is_verified;
    }

    public function update(User $user, Bid $bid): bool
    {
        return $bid->user()->is($user);
    }

    public function delete(User $user, Bid $bid): bool
    {
        return $this->update($user, $bid);
    }
}
