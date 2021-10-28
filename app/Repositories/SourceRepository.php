<?php

namespace App\Repositories;

use App\Models\Source;
use Illuminate\Support\Collection;

class SourceRepository
{
    public function getAll(): Collection
    {
        return Source::select(['id', 'title', 'time', 'color'])->get();
    }
}
