<?php

namespace App\Services;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Collection;

class WorkTimeService
{
    public function getStartEndOfDay(string $day): array
    {
        return [
            'start' => Carbon::parse($day)->startOfDay(),
            'end' => Carbon::parse($day)->endOfDay(),
        ];
    }

    public function generateIntervalByHours(string $start, string $end): Collection
    {
        $interval = CarbonInterval::minutes(60)
            ->toPeriod($start, $end)
            ->toArray();

        return collect($interval)
            ->map(function ($time) {
                return $time->format('H:i');
            });
    }

    public function generateDurationIntervalFromAssets(Collection $assets): Collection
    {
        $exceptedTime = collect();

        foreach ($assets as $asset) {
            $durationInHours = Carbon::parse($asset->source->time)->hour;

            $startTime = $asset->date;
            //уменьшаем duration на 1 час, т.к. начало уже занимает 1 час
            $endTime = $asset->date->addHours(--$durationInHours);

            $this->generateIntervalByHours($startTime, $endTime)
                ->each(
                    fn ($time) => $exceptedTime->push($time)
                );
        }

        return $exceptedTime;
    }
}
