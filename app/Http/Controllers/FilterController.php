<?php

namespace App\Http\Controllers;

use App\Http\Responses\JsonResponse as Response;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterProduct(Request $request): JsonResponse
    {
        $category = $request->input("category");
        $subcategory = $request->input("subcategory");
        $prices = explode('-', $request->input("price"));

        return Response::success(
            Product::with(['productImage', 'category'])
            ->when($request->filled('category'), function (Builder $query) use ($category) {
                $query->where('category_id', $category);
            })
            ->when($request->filled('subcategory'), function (Builder $query) use ($subcategory) {
                $query->where('subcategory_id', $subcategory);
            })
            ->when($request->filled('price'), function (Builder $query) use ($prices) {
                $query->whereBetween('starting_price', $prices);
            })->latest()->get()
        );
    }
}
