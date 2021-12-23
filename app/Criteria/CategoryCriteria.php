<?php

namespace App\Criteria;

use App\Models\Category;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class CategoryCriteria implements CriteriaInterface
{
    public function __construct(
        private Category $category,
    ) {}

    public function apply($model, RepositoryInterface $repository)
    {
        $model->with('categories')
            ->whereHas(
                'categories',
                fn ($query) => $query->whereId($this->category->id),
            );

        return $model;
    }
}
