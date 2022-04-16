<?php

namespace App\Http\Controllers;

use App\Contracts\ProductRepositoryContract;
use App\Http\Resources\CategoryProductsResource;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private ProductRepositoryContract $productRepository;

    public function __construct(ProductRepositoryContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index(): View
    {
        $categories = Category::all()->toTree();

        return view('categories.index', compact('categories'));
    }

    public function show(Request $request, Category $category)
    {
        $products = $this->productRepository->byCategory($category);

        if($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => CategoryProductsResource::collection($products),
            ]);
        }

        return view(
            'categories.show',
            compact(
                'products'
            ),
        );
    }
}
