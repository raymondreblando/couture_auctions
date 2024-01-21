<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Http\Responses\JsonResponse as Response;
use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function store(SubCategoryRequest $request): JsonResponse
    {
        $request->validated();
        SubCategory::create($request->only('subcategory_name'));

        return Response::success('Subcategory was created');
    }

    public function show(string $id): JsonResponse
    {
        $subcategory = SubCategory::select(['subcategory_id', 'subcategory_name'])
            ->findOrFail($id);

        return Response::success($subcategory);
    }

    public function update(SubCategoryRequest $request, string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->only('subcategory_name'));

        return Response::success('Subcategory was updated');
    }
}
