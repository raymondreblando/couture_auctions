<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BidHistoryController extends Controller
{
    public function __invoke(): View
    {
        $user = Auth::user();

        $rankings = $user->bids()->addSelect(
            DB::raw('ROW_NUMBER() OVER (ORDER BY amount DESC) AS rank')
        )->latest()->get();

        $bids = $user->bids()->with([
            'product' => function (Builder $query) {
                $query->with(['category', 'productImage']);
            }])->get();
        
        return view('default.bid-history', compact('rankings', 'bids'));
    }
}
