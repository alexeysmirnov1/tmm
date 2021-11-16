<?php

namespace App\Repositories;

use App\Models\Asset;
use Illuminate\Support\Collection;

class AssetRepository
{
    public function getForDay(string $startDay, string $endDay): Collection
    {
        return Asset::with('source')
            ->whereBetween('date', [$startDay, $endDay])
            ->get();
    }
}
