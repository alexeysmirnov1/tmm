<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(25);
        ProductResource::collection($products);

        return response()
            ->json([
                'data' => $products->all(),
                'currentPage' => $products->currentPage(),
                'lastPage' => $products->lastPage(),
            ]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()
            ->json($product);
    }
}
