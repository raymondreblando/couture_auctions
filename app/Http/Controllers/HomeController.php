<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        
        return view('index', [
            'products' => Product::with(
                'productImage', 'category'
            )->latest()->take(12)->get()
        ]);
    }
}
