<?php

namespace App\Repositories;

use App\Models\Asset;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AssetRepository
{
    public function getForDay(string $date): Collection
    {
        $startDay = Carbon::parse($date)->startOfDay();
        $endDay = Carbon::parse($date)->endOfDay();

        return Asset::with('source')
            ->whereBetween('date', [$startDay, $endDay])
            ->get();
    }
}
