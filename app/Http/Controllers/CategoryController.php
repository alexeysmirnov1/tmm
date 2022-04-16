<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryProductsResource;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index(): View
    {
        $categories = Category::all()->toTree();

//        $categories = Category::whereIsAfter(2)->get()->toTree();

//        $categories = Category::descendantsAndSelf(2)->toTree();

        return view('categories.index', compact('categories'));
    }

    public function show(Request $request, Category $category)
    {
//        $products = $category->products()
//            ->with('attributes')
//            ->paginate(25);

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
