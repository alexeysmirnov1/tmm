<?php

namespace App\Services;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class WorkTimeService
{
    public function generateIntervalForDay(string $date): Collection
    {
        $startDay = Carbon::parse($date)->startOfDay();
        $endDay = Carbon::parse($date)->endOfDay();

        $interval = CarbonInterval::minutes(60)
            ->toPeriod($startDay, $endDay)
            ->toArray();

        return collect($interval)->map(function ($time) {
            return $time->format('H:i');
        });
    }

    public function generateDurationIntervalForAssets(Collection $assets): array
    {
        $exceptedTime = [];

        foreach ($assets as $asset) {
            $durationInHours = Carbon::parse($asset->source->time)->hour;

            $startTime = $asset->date;
            //уменьшаем duration на 1 час, т.к. начало уже занимает 1 час
            $endTime = $asset->date->addHours(--$durationInHours);

            $assetInterval = CarbonInterval::minutes(60)
                ->toPeriod($startTime, $endTime)
                ->toArray();

            collect($assetInterval)->each(function ($time) use (&$exceptedTime) {
                $exceptedTime[] = $time->format('H:i');
            });
        }

        return $exceptedTime;
    }
}
