<?php

namespace App\Http\Controllers;

use App\Models\GetInTouch;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $trendings = Product::with([
                'category',
                'productImage',
                'bids.user' => function (Builder $query) {
                    $query->take(3);
                    $query->with('profile');
                }
            ])->withCount('bids')
            ->having('bids_count', '>', 0)
            ->orderByDesc('bids_count')
            ->take(6)
            ->get();

        $recentSignups = User::users()->with('profile')
            ->take(3)->latest()->get();

        $topBidders = User::users()->with('profile')
            ->withSum('bids', 'amount')
            ->orderByDesc('bids_sum_amount')
            ->take(5)
            ->get();

        $recentMessages = GetInTouch::latest()->take(3)->get();
            
        return view('admin.dashboard', compact('recentSignups', 'trendings', 'topBidders', 'recentMessages'));
    }
}
