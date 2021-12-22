<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryProductsResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::oldest()
              ->get()
              ->toTree();

//        $categories = Category::oldest()
//            ->whereIsAfter(20)
//            ->get()
//            ->toTree();

//        $categories = Category::descendantsAndSelf(19)->toTree();

        return view(
            'categories.index',
            compact('categories'),
        );
    }

    public function show(Request $request, Category $category): JsonResponse|View
    {
        $products = $category->products()
            ->with('attributes.attribute')
            ->paginate(25);

        if($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => CategoryProductsResource::collection($products),
            ]);
        }

        return view(
            'categories.show',
            compact('products'),
        );
    }
}
