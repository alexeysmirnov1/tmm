<?php

namespace App\Repositories;

use App\Criteria\CategoryCriteriaCriteria;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{
    private const PER_PAGE = 25;

    public function model(): string
    {
        return Product::class;
    }

    public function byCategory(Category $category)
    {
        return $this->with('attributes')
            ->pushCriteria(new CategoryCriteriaCriteria($category))
            ->paginate(self::PER_PAGE);
    }
}
