<?php

namespace App\Actions;

use App\Models\Asset;
use App\Models\Source;
use App\Repositories\AssetRepository;
use App\Repositories\SourceRepository;
use App\Services\WorkTimeService;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class FormCreateAssetsAction
{
//    public function execute(Request $request): array
//    {
//        $sources = Source::select(['id', 'title', 'time', 'color'])->get();
//
//        $startDay = Carbon::parse($request->date)->startOfDay();
//        $endDay = Carbon::parse($request->date)->endOfDay();
//
//        $assets = Asset::with('source')
//            ->whereBetween('date', [$startDay, $endDay])
//            ->get();
//
//        $interval = CarbonInterval::minutes(60)
//            ->toPeriod($startDay, $endDay)
//            ->toArray();
//
//        $workTime = collect($interval)->map(function ($time) {
//            return $time->format('H:i');
//        });
//
//        $exceptedTime = [];
//        foreach($assets as $asset) {
//            $durationInHours = Carbon::parse($asset->source->time)->hour;
//
//            $startTime = $asset->date;
//            //уменьшаем duration на 1 час, т.к. начало уже занимает 1 час
//            $endTime = $asset->date->addHours(--$durationInHours);
//
//            $assetInterval = CarbonInterval::minutes(60)
//                ->toPeriod($startTime, $endTime)
//                ->toArray();
//
//            collect($assetInterval)->each(function ($time) use (&$exceptedTime) {
//                $exceptedTime[] = $time->format('H:i');
//            });
//        }
//
//        $workTime = $workTime->diff($exceptedTime);
//
//        return compact(
//            'sources',
//            'workTime'
//        );
//    }

    private SourceRepository $sourceRepository;
    private AssetRepository $assetRepository;
    private WorkTimeService $workTimeService;

    public function __construct(
        SourceRepository $sourceRepository,
        AssetRepository $assetRepository,
        WorkTimeService $workTimeService
    ) {
        $this->sourceRepository = $sourceRepository;
        $this->assetRepository = $assetRepository;
        $this->workTimeService = $workTimeService;
    }

    public function execute(Request $request): array
    {
        $sources = $this->sourceRepository->getAll();

        $assets = $this->assetRepository->getForDay($request->date);

        $workTime = $this->workTimeService->generateIntervalForDay($request->date);

        $exceptedTime = $this->workTimeService->generateDurationIntervalForAssets($assets);

        $workTime = $workTime->diff($exceptedTime);

        return compact(
            'sources',
            'workTime'
        );
    }
}
