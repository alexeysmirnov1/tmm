<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class NotDeletedCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model->where('deleted', false);
        return $model;
    }
}
