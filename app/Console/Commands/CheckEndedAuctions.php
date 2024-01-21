<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Notifications\AuctionResult;
use Illuminate\Console\Command;

class CheckEndedAuctions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auctions:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for ended auctions and send database notification';

    public function handle()
    {
        $products = Product::with('bids')
            ->where('bid_end_date', '<', now())
            ->whereNull('ended_at')
            ->get();

        foreach ($products as $product) {
            $product->update(['ended_at' => now()]);

            if ($product->has('bids')) {
                foreach ($product->bids as $bid) {
                    $hasWon = in_array($bid->user_id, $this->determineWinner($product));
                    $bid->user->notify(new AuctionResult($product, $hasWon));
                }
            }
        }
    }

    private function determineWinner(Product $product): array
    {
        return $product->bids()->orderByDesc('amount')
            ->pluck('user_id')
            ->take(1)
            ->toArray();
    }
}
