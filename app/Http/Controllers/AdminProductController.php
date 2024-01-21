<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Responses\JsonResponse as Response;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Services\UploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function __construct(
        private UploadService $uploadService
    ){}

    public function index(): View
    {
        $products = Product::with([
            'category', 'productImage'
        ])->get();

        return view('admin.product.index', ['products' => $products]);
    }

    public function create(): View
    {
        $categories = Category::all()->pluck('category_name', 'category_id');
        $subcategories = SubCategory::all()->pluck('subcategory_name', 'subcategory_id');
        
        return view('admin.product.create', compact('categories', 'subcategories'));
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        $filenames = $this->uploadService->upload($request, $product->product_id);

        $product->productImage()->create([
            'image' => $filenames[0],
        ]);

        return Response::success('Product was created');
    }

    public function show(Product $product): View
    {
        return view('admin.product.show', [
            'product'=> $product->load([
                'category', 'productImage', 'bids.user.profile'
            ])
        ]);
    }

    public function edit(Product $product): View
    {
        $product = $product->load(['category', 'subcategory', 'productImage']);
        $categories = Category::all()->pluck('category_name', 'category_id');
        $subcategories = SubCategory::all()->pluck('subcategory_name', 'subcategory_id');

        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(UpdateProductRequest $request, string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        $this->uploadService->upload($request, $id);

        return Response::success('Product was updated');
    }

    public function destroy(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        
        $this->uploadService->deleteUpload(
            ['product_images/'],
            [$product->productImage->image]
        );
        
        $product->delete();

        return Response::success('Product was deleted');
    }
}
