<?php

namespace App\Repositories;

use App\Criteria\CategoryCriteria;
use App\Criteria\NotDeletedCriteria;
use App\Models\Category;
use App\Models\Product;
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
//            ->pushCriteria(new CategoryCriteria($category))
            ->pushCriteria(NotDeletedCriteria::class)
            ->paginate(self::PER_PAGE);
    }
}
