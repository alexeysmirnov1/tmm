<?php

namespace App\Actions;

use App\Repositories\AssetRepository;
use App\Repositories\SourceRepository;
use App\Services\WorkTimeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormCreateAssetAction
{
    private SourceRepository $sourceRepository;

    private AssetRepository $assetRepository;

    private WorkTimeService $workTimeService;

    public function __construct(
        SourceRepository $sourceRepository,
        AssetRepository $assetRepository,
        WorkTimeService $workTimeService
    )
    {
        $this->sourceRepository = $sourceRepository;
        $this->assetRepository = $assetRepository;
        $this->workTimeService = $workTimeService;
    }

    public function execute(Request $request): array
    {
        $sources = $this->sourceRepository->getAll();

        $startDay = Carbon::parse($request->data)->startOfDay();
        $endDay = Carbon::parse($request->data)->endOfDay();

        $assets = $this->assetRepository->getForDay($startDay, $endDay);

        $workTime = $this->workTimeService->generateIntervalForDay($startDay, $endDay);

        $exceptedTime = $this->workTimeService->generateDurationIntervalAssets($assets);

        $workTime = $workTime->diff($exceptedTime);

        return compact(
            'sources',
            'workTime',
        );
    }
}
