<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index(Request $request, Category $category): JsonResponse
    {
        return response()
            ->json($category->products);
    }

    public function store(Request $request, Category $category): JsonResponse
    {
        $product = $category->products()
            ->create($request->all());

        return response()
            ->json($product);
    }
}
