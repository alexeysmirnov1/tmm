<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private const PER_PAGE = 25;

    public function index(): JsonResponse
    {
        $products = Category::paginate(self::PER_PAGE);
        $collection = CategoryResource::collection($products);

        return response()
            ->json($collection);
    }

    public function store(Request $request): JsonResponse
    {
        $category = Category::create($request->all());

        return response()->json($category);
    }

    public function show(Category $category): JsonResponse
    {
        return response()
            ->json(
                new CategoryResource($category)
            );
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(true);
    }
}
