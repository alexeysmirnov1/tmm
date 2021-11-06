<?php

namespace App\Repositories;

use App\Models\Asset;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AssetRepository
{
    public function getByInterval(string $start, string $end): Collection
    {
        return Asset::with('source')
            ->whereBetween('date', [$start, $end])
            ->get();
    }
}
