<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Responses\JsonResponse as Response;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('admin.categories', compact('categories', 'subcategories'));
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $request->validated();
        Category::create($request->only('category_name'));

        return Response::success('Category was created');
    }

    public function show(string $id): JsonResponse
    {
        $category = Category::select(['category_id', 'category_name'])
            ->findOrFail($id);

        return Response::success($category);
    }

    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->only('category_name'));

        return Response::success('Category was updated');
    }
}
