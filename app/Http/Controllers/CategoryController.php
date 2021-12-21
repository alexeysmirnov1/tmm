<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
//        $categories = Category::oldest()
//              ->get()
//              ->toTree();

//        $categories = Category::oldest()
//            ->whereIsAfter(20)
//            ->get()
//            ->toTree();

        $categories = Category::descendantsAndSelf(19)->toTree();

        return view(
            'categories.index',
            compact('categories'),
        );
    }
}
