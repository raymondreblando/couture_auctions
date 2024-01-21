<?php

namespace App\Http\Controllers;

use App\Http\Requests\BiddingRequest;
use App\Http\Responses\JsonResponse as Response;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BiddingController extends Controller
{
    public function store(BiddingRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $request->user()->bids()->updateOrCreate(
            ['product_id' => $validated['product_id']],
            [
                'product_id' => $validated['product_id'],
                'amount' => $validated['amount']
            ]
        );

        return Response::success("Bid was saved");
    }

    public function fetch(string $id): JsonResponse
    {
        $product = Product::with([
            'bids' => function (Builder $query) {
                $query->orderByDesc('amount');
                $query->with(['user.profile']);
            }
        ])->findOrFail($id);

        return Response::success($product->bids);
    }

    public function destroy(string $id): JsonResponse
    {
        $bid = auth()->user()->bids()
            ->where('product_id', $id)
            ->first();

        $this->authorize('delete', $bid);

        $bid->delete();

        return Response::success('Bid amount was removed');
    }
}
