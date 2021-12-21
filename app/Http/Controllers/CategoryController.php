<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function store(CreateCategoryRequest $request)
    {
        dd(123);
    }

    public function update(UpdateCategoryRequest $request)
    {
        dd(123);
    }
}
