<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DefaultProductController extends Controller
{
    public function index(): View
    {
        return view('products', [
            'products' => Product::with([
                'category', 'productImage'
            ])->latest()->get(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all()
        ]);
    }

    public function show(Product $product): View
    {
        return view('product-bids', [
            'product' => $product->load([
                'category',
                'productImage',
                'bids' => function (Builder $query) {
                    $query->orderByDesc('amount');
                    $query->with(['user.profile']);
                },
            ])
        ]);
    }
}
