<?php

namespace App\Services;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class WorkTimeService
{
    public function generateIntervalForDay(string $startDay, string $endDay): Collection
    {
        $interval = CarbonInterval::minutes(60)
            ->toPeriod($startDay, $endDay)
            ->toArray();

        return collect($interval)->map(function ($time) {
            return $time->format('H:i');
        });
    }

    public function generateDurationIntervalAssets(Collection $assets): Collection
    {
        $exceptedTime = collect();

        foreach ($assets as $asset) {
            $durationInHours = Carbon::parse($asset->source->time)->hour;

            $startTime = $asset->date;
            //уменьшаем на 1 час, т.к. начало уже занимает 1 час
            $endTime = $asset->date->addHours(--$durationInHours);

            $assetInterval = CarbonInterval::minutes(60)
                ->toPeriod($startTime, $endTime)
                ->toArray();

            collect($assetInterval)->each(function ($time) use (&$exceptedTime) {
                $exceptedTime->push($time->format('H:i'));
            });
        }

        return $exceptedTime;
    }
}
